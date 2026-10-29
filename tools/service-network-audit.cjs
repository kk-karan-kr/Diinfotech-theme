// Read-only browser audit; strips query strings from reported resource URLs.
const {chromium} = require('./browser/node_modules/playwright');
(async()=>{
 const browser=await chromium.launch({channel:'chrome'});
 try {
  const page=await browser.newPage();
  const client=await page.context().newCDPSession(page);
  await client.send('Network.enable');
  const requests=[]; const cache=[];
  client.on('Network.requestWillBeSent',e=>{
   if (/recaptcha|gtm\.js|gtag\/js|fbevents\.js/.test(e.request.url)) requests.push({url:e.request.url.split('?')[0],type:e.type,frame:e.frameId,initiator:e.initiator.type,source:e.initiator.stack?.callFrames?.[0]?.url?.split('?')[0]});
  });
  client.on('Network.responseReceived',e=>{
   if (/diinfotech\.com/.test(e.response.url) && /Stylesheet|Script|Font/.test(e.type)) cache.push({url:e.response.url.split('?')[0],status:e.response.status,cacheControl:e.response.headers['cache-control']||e.response.headers['Cache-Control']||null,expires:e.response.headers.expires||e.response.headers.Expires||null});
  });
  await page.goto('https://diinfotech.com/staging/services/seo-company-in-india/',{waitUntil:'domcontentloaded',timeout:45000});
  await page.waitForTimeout(12000);
  console.log(JSON.stringify({requests,cache,markup:await page.evaluate(()=>({forms:document.querySelectorAll('.wpcf7 form').length,scripts:[...document.scripts].filter(s=>s.src&&/jquery|recaptcha/.test(s.src)).map(s=>({url:s.src.split('?')[0],defer:s.defer,async:s.async})),noindex:[...document.querySelectorAll('meta[name=robots]')].map(m=>m.content)}))},null,2));
 } finally {await browser.close();}
})().catch(e=>{console.error(e.message);process.exit(1)});
