<?php
/** Service editor labels; preserve ACF's normal validation. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Build section-aware labels from the canonical service field definitions. */
function di_infotech_service_editor_definitions() {
	static $definitions = null;
	if ( null !== $definitions ) {
		return $definitions;
	}
	$definitions = array();
	$collect = static function ( $fields, $section = '' ) use ( &$collect, &$definitions ) {
		foreach ( $fields as $field ) {
			$label = $field['label'] ?? '';
			$context = $section;
			if ( preg_match( '/\(HTML[^)]*\)/', $label, $match ) ) {
				$context = $match[0];
			}
			if ( ! empty( $field['key'] ) ) {
				$definitions[ $field['key'] ] = array(
					'label' => $label . ( $context && false === strpos( $label, '(HTML' ) ? ' ' . $context : '' ),
					'required' => $field['required'] ?? 0,
				);
			}
			$collect( $field['sub_fields'] ?? array(), $context );
			foreach ( $field['layouts'] ?? array() as $layout ) {
				$layout_context = $context;
				if ( preg_match( '/\(HTML[^)]*\)/', $layout['label'], $match ) ) {
					$layout_context = $match[0];
				}
				$collect( $layout['sub_fields'] ?? array(), $layout_context );
			}
		}
	};
	foreach ( array( 'group_67ab4aa9ed7e3', 'group_6aace3ae54658' ) as $key ) {
		$path = get_template_directory() . '/acf-json/' . $key . '.json';
		if ( is_readable( $path ) ) {
			$group = json_decode( file_get_contents( $path ), true );
			$collect( $group['fields'] ?? array() );
		}
	}
	return $definitions;
}

/** Apply labels and restore the required settings even before a JSON sync. */
function di_infotech_service_editor_field( $field ) {
	$definitions = di_infotech_service_editor_definitions();
	if ( isset( $definitions[ $field['key'] ] ) ) {
		$field['label'] = $definitions[ $field['key'] ]['label'];
		$field['required'] = $definitions[ $field['key'] ]['required'];
	}
	return $field;
}
add_filter( 'acf/load_field', 'di_infotech_service_editor_field', 20 );
