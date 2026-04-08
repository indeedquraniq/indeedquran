<?php
require_once 'data.php';
$page_title = "Indeed Qur'an — Read & Listen to the Holy Quran Free | indeedquran.com";
$page_desc = "Read and Listen to the Holy Quran online free. 230+ reciters. Live Islamic Radio from Makkah and Madinah. Urdu, English, Bengali translations. No ads ever.";
$page_keywords = "quran online, listen quran, read quran free, quran mp3 download, indeed quran, indeedquran, quran with urdu translation, quran recitation online";
$page_url = "https://indeedquran.com/";
require_once 'header.php';
?>
<style>
#splash{position:fixed;inset:0;background:#0A0E1A;display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:9999;cursor:pointer;}
#splash.hide{opacity:0;pointer-events:none;transition:opacity 1s ease;}
.sp-glow{position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(0,200,232,0.18) 0%,transparent 70%);animation:glowP 2.5s ease-in-out infinite;}
@keyframes glowP{0%,100%{transform:scale(1);}50%{transform:scale(1.2);}}
.sp-logo{position:relative;z-index:1;animation:spIn 1.5s cubic-bezier(.34,1.56,.64,1) .1s both;filter:drop-shadow(0 0 50px rgba(0,200,232,.6));}
.sp-logo img{width:clamp(240px,30vw,320px);height:auto;}
.sp-dots{display:flex;gap:10px;margin-top:44px;position:relative;z-index:1;animation:fUp .6s ease 1.6s both;}
.dot{width:10px;height:10px;border-radius:50%;background:rgba(0,200,232,.2);animation:dp 1.4s ease infinite;}
.dot:nth-child(2){animation-delay:.2s;}.dot:nth-child(3){animation-delay:.4s;}
.sp-hint{font-size:12px;color:rgba(255,255,255,.2);letter-spacing:.12em;margin-top:20px;position:relative;z-index:1;animation:fUp .6s ease 2s both;}
@keyframes spIn{0%{opacity:0;transform:scale(.05) rotate(-300deg);}60%{transform:scale(1.12) rotate(6deg);}80%{transform:scale(.95) rotate(-2deg);}100%{opacity:1;transform:scale(1) rotate(0deg);}}
@keyframes fUp{from{opacity:0;transform:translateY(14px);}to{opacity:1;transform:translateY(0);}}
@keyframes dp{0%,80%,100%{background:rgba(0,200,232,.2);}40%{background:#00C8E8;}}
#main{opacity:0;transition:opacity .8s ease;}
#main.show{opacity:1;}
.hijri-bar{background:linear-gradient(135deg,rgba(0,200,232,.08),rgba(13,19,33,.95));border-bottom:1px solid var(--border);padding:14px 48px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;}
body.light .hijri-bar{background:linear-gradient(135deg,rgba(0,200,232,.06),rgba(240,244,248,.95));}
@media(max-width:700px){.hijri-bar{padding:12px 18px;}}
.hb-left{display:flex;align-items:center;gap:20px;flex-wrap:wrap;}
.hb-hijri{font-family:'Scheherazade New',serif;font-size:22px;color:var(--text);}
.hb-greg{font-size:13px;color:var(--muted);font-family:'Inter',sans-serif;}
.hb-event{display:flex;align-items:center;gap:8px;background:var(--cyan2);border:1px solid var(--cyan3);border-radius:8px;padding:7px 16px;display:none;}
.hb-event.show{display:flex;}
.hb-dot{width:7px;height:7px;border-radius:50%;background:var(--cyan);animation:pulse 1.5s ease infinite;}
@keyframes pulse{0%,100%{opacity:1;}50%{opacity:.4;}}
.hb-ev-text{font-size:12px;color:var(--cyan);font-weight:500;}
.hb-nav{display:flex;gap:6px;align-items:center;}
.hb-btn{width:30px;height:30px;border-radius:8px;background:var(--cyan2);border:1px solid var(--cyan3);color:var(--cyan);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;}
.hb-mn{font-size:12px;color:var(--muted);padding:0 8px;}
.home-cards{display:grid;grid-template-columns:repeat(2,1fr);gap:0;min-height:calc(100vh - 68px - 52px);}
@media(max-width:768px){.home-cards{grid-template-columns:1fr;}}
.hc{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:60px 40px;cursor:pointer;transition:.2s;border:0.5px solid var(--border);position:relative;overflow:hidden;min-height:300px;text-decoration:none;}
.hc::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(0,200,232,.04),transparent);opacity:0;transition:.3s;}
.hc:hover::before{opacity:1;}
.hc:hover{background:rgba(0,200,232,.03);}
.hc-icon{font-size:60px;margin-bottom:20px;transition:.3s;}
.hc:hover .hc-icon{transform:scale(1.08);}
.hc-title{font-family:'Cinzel',serif;font-size:26px;font-weight:700;color:var(--text);margin-bottom:10px;text-align:center;}
.hc-sub{font-size:14px;color:var(--muted);text-align:center;line-height:1.6;max-width:300px;}
.hc-action{margin-top:22px;background:var(--cyan);color:#0A0E1A;padding:12px 30px;border-radius:10px;font-size:14px;font-weight:700;font-family:'Cinzel',serif;border:none;cursor:pointer;transition:.2s;}
.hc:hover .hc-action{background:#00aecf;}
.radio-section{width:100%;max-width:380px;margin-top:18px;}
.rs{display:flex;align-items:center;gap:10px;padding:10px 13px;border-radius:10px;cursor:pointer;border:1px solid var(--border);transition:.2s;margin-bottom:8px;background:var(--card);}
.rs:hover,.rs.playing{border-color:var(--cyan);background:var(--cyan2);}
.rs-icon{font-size:18px;}
.rs-info{flex:1;}
.rs-name{font-size:12px;font-weight:600;color:var(--text);}
.rs-sub{font-size:10px;color:var(--muted);margin-top:1px;}
.rs-play{font-size:10px;color:var(--cyan);width:26px;height:26px;border-radius:50%;background:var(--cyan2);border:1px solid var(--cyan3);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.rs.playing .rs-play{background:var(--cyan);color:#0A0E1A;}
.vol-row{display:flex;align-items:center;gap:6px;margin-top:8px;padding:8px 10px;background:var(--card);border-radius:8px;border:1px solid var(--border);}
.vol-lbl{font-size:11px;color:var(--muted);}
.vol-sl{flex:1;accent-color:var(--cyan);}
.radio-now{font-size:11px;color:var(--cyan);text-align:center;margin-top:6px;min-height:16px;}
.mini-btns{display:flex;flex-direction:column;gap:10px;width:100%;max-width:280px;margin-top:18px;}
.mini-btn{padding:13px 20px;border-radius:10px;border:1px solid var(--border);cursor:pointer;transition:.2s;display:flex;align-items:center;gap:12px;background:var(--card);text-decoration:none;}
.mini-btn:hover{border-color:var(--cyan);background:var(--cyan2);}
.mb-icon{font-size:22px;}
.mb-text{font-family:'Cinzel',serif;font-size:14px;color:var(--text);}
</style>

<div id="splash" onclick="hideSplash()">
  <div class="sp-glow"></div>
  <div class="sp-logo"><img src="/logo-circle.png" alt="Indeed Qur'an — Guidance for Humanity"></div>
  <div class="sp-dots"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div>
  <div class="sp-hint">Tap anywhere to enter</div>
</div>

<div id="main">
  <div class="hijri-bar">
    <div class="hb-left">
      <div>
        <div class="hb-hijri" id="hijriAr">٧ شَوَّال ١٤٤٧</div>
        <div class="hb-greg" id="hijriEn">7 Shawwal 1447 AH — Wednesday, 8 April 2026</div>
      </div>
      <div class="hb-event" id="islamicEvent">
        <div class="hb-dot"></div>
        <div class="hb-ev-text" id="islamicEventText"></div>
      </div>
    </div>
    <div class="hb-nav">
      <div class="hb-btn" onclick="changeMonth(-1)">‹</div>
      <span class="hb-mn" id="hijriMN">Shawwal 1447</span>
      <div class="hb-btn" onclick="changeMonth(1)">›</div>
    </div>
  </div>

  <div class="home-cards">
    <a class="hc" href="/listen-quran/">
      <div class="hc-icon">🎧</div>
      <div class="hc-title">Listen Quran</div>
      <div class="hc-sub">230+ world-famous reciters. Sudais, Mishary, Minshawi, Al-Hudhaifi. Urdu, English, Bengali translations. Download MP3 free.</div>
      <button class="hc-action">Open Audio Player</button>
    </a>
    <a class="hc" href="/read-quran/">
      <div class="hc-icon">📖</div>
      <div class="hc-title">Read Quran</div>
      <div class="hc-sub">Scanned Mushaf pages and clear Arabic text. English and Urdu translations. Font size control. Tajweed colours.</div>
      <button class="hc-action">Open Quran Reader</button>
    </a>
    <div class="hc" style="cursor:default;">
      <div class="hc-icon">📻</div>
      <div class="hc-title">Live Quran Radio</div>
      <div class="hc-sub">Live recitation from Makkah, Madinah and Islamic stations 24/7.</div>
      <div class="radio-section">
        <div class="rs" id="rs1" onclick="playR(1,event)"><div class="rs-icon">🕌</div><div class="rs-info"><div class="rs-name">Makkah — Masjid Al-Haram</div><div class="rs-sub">Live from Holy Mosque</div></div><div class="rs-play" id="rp1">▶</div></div>
        <div class="rs" id="rs2" onclick="playR(2,event)"><div class="rs-icon">🕍</div><div class="rs-info"><div class="rs-name">Madinah — Masjid An-Nabawi</div><div class="rs-sub">Live from Prophet's Mosque</div></div><div class="rs-play" id="rp2">▶</div></div>
        <div class="rs" id="rs3" onclick="playR(3,event)"><div class="rs-icon">📖</div><div class="rs-info"><div class="rs-name">Quran Radio 24/7</div><div class="rs-sub">Continuous recitation</div></div><div class="rs-play" id="rp3">▶</div></div>
        <div class="rs" id="rs4" onclick="playR(4,event)"><div class="rs-icon">🌙</div><div class="rs-info"><div class="rs-name">Al-Quran Al-Kareem</div><div class="rs-sub">Saudi Arabia official radio</div></div><div class="rs-play" id="rp4">▶</div></div>
        <div class="vol-row"><span class="vol-lbl">🔉</span><input type="range" class="vol-sl" min="0" max="1" step="0.05" value="0.8" oninput="setRVol(this.value)"><span class="vol-lbl">🔊</span></div>
        <div class="radio-now" id="radioNow"></div>
      </div>
    </div>
    <div class="hc" style="cursor:default;">
      <div class="hc-icon">🤲</div>
      <div class="hc-title">Dhikr &amp; Islamic Q&amp;A</div>
      <div class="hc-sub">Morning, evening and night adhkar with Arabic, translation and benefits. Search Islamic questions across 6 authentic scholar sources.</div>
      <div class="mini-btns">
        <a class="mini-btn" href="/dhikr/"><div class="mb-icon">📿</div><div class="mb-text">Dhikr &amp; Hadith</div></a>
        <a class="mini-btn" href="/islamic-qa/"><div class="mb-icon">🔍</div><div class="mb-text">Islamic Q&amp;A</div></a>
      </div>
    </div>
  </div>

  <!-- SEO links -->
  <div style="padding:40px 60px;border-top:1px solid var(--border);">
    <h2 style="font-family:Cinzel,serif;font-size:22px;color:var(--text);margin-bottom:16px;">Popular Surahs</h2>
    <div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:28px;">
      <?php $pop=[18,36,55,56,67,2,3,112,113,114,1,48,78,97];
      foreach($pop as $n): if(!isset($surahs[$n])) continue; $s=$surahs[$n]; ?>
      <a href="/surah/<?= $s['slug'] ?>/" style="background:var(--card);border:1px solid var(--border);border-radius:8px;padding:8px 16px;text-decoration:none;transition:.2s;font-size:13px;color:var(--muted);" onmouseover="this.style.borderColor='#00C8E8'" onmouseout="this.style.borderColor='var(--border)'"><?= $s['en'] ?> — <?= $s['ar'] ?></a>
      <?php endforeach; ?>
    </div>
    <h2 style="font-family:Cinzel,serif;font-size:22px;color:var(--text);margin-bottom:16px;">Top Reciters</h2>
    <div style="display:flex;flex-wrap:wrap;gap:10px;">
      <?php foreach($reciters as $r): ?>
      <a href="/listen-quran/reciter/<?= $r['slug'] ?>/" style="background:var(--card);border:1px solid var(--border);border-radius:8px;padding:8px 16px;text-decoration:none;transition:.2s;font-size:13px;color:var(--muted);" onmouseover="this.style.borderColor='#00C8E8'" onmouseout="this.style.borderColor='var(--border)'"><?= htmlspecialchars($r['name']) ?></a>
      <?php endforeach; ?>
    </div>
  </div>

  <?php require_once 'footer.php'; ?>
</div>

<script>
var splashDone=false;
function hideSplash(){if(splashDone)return;splashDone=true;var s=document.getElementById('splash');var m=document.getElementById('main');s.classList.add('hide');setTimeout(()=>s.style.display='none',1000);m.classList.add('show');}
setTimeout(hideSplash,4000);

var hijriOffset=0;
var hMonths=['Muharram','Safar',"Rabi' Al-Awwal","Rabi' Al-Thani","Jumada Al-Awwal","Jumada Al-Thani",'Rajab',"Sha'ban",'Ramadan','Shawwal',"Dhul Qa'dah",'Dhul Hijjah'];
var hMonthsAr=['مُحَرَّم','صَفَر','رَبِيع الأَوَّل','رَبِيع الثَّانِي','جُمَادَى الأُولَى','جُمَادَى الآخِرَة','رَجَب','شَعْبَان','رَمَضَان','شَوَّال','ذُو القَعْدَة','ذُو الحِجَّة'];
var islamicEvents={'1-1':'Islamic New Year — Hijri New Year begins','1-10':'Day of Ashura — Prophet Musa was saved','2-17':'Battle of Badr — First great victory of Islam','3-12':'Mawlid An-Nabi — Birth of Prophet Muhammad ﷺ','7-27':"Isra' and Mi'raj — Night Journey of the Prophet ﷺ",'8-15':"Laylat Al-Bara'ah — Night of Forgiveness",'9-1':'Ramadan begins — Month of fasting and Quran','9-27':'Laylat Al-Qadr — Night of Power','10-1':'Eid Al-Fitr — Celebration after Ramadan','12-9':'Day of Arafah — Forgiveness for two years of sins','12-10':'Eid Al-Adha — Festival of Sacrifice'};
function toAr(n){return n.toString().replace(/\d/g,d=>'٠١٢٣٤٥٦٧٨٩'[d]);}
function gregorianToHijri(g){var jd=Math.floor((14+g.getMonth()+1)/12);var y=g.getFullYear()+4800-jd;var m=(g.getMonth()+1)+12*jd-3;var dn=g.getDate()+Math.floor((153*m+2)/5)+365*y+Math.floor(y/4)-Math.floor(y/100)+Math.floor(y/400)-32045;var l=dn-1948440+10632;var n=Math.floor((l-1)/10631);l=l-10631*n+354;var j=(Math.floor((10985-l)/5316))*(Math.floor((50*l)/17719))+(Math.floor(l/5670))*(Math.floor((43*l)/15238));l=l-(Math.floor((30-j)/15))*(Math.floor((17719*j)/50))-(Math.floor(j/16))*(Math.floor((15238*j)/43))+29;var hm=Math.floor((24*l)/709);var hd=l-Math.floor((709*hm)/24);var hy=30*n+j-30;return{d:hd,m:hm,y:hy};}
function updateCal(){var now=new Date();now.setMonth(now.getMonth()+hijriOffset);var h=gregorianToHijri(now);var mi=(h.m-1)%12;document.getElementById('hijriAr').textContent=toAr(h.d)+' '+hMonthsAr[mi]+' '+toAr(h.y);document.getElementById('hijriEn').textContent=h.d+' '+hMonths[mi]+' '+h.y+' AH — '+now.toLocaleDateString('en-US',{weekday:'long',year:'numeric',month:'long',day:'numeric'});document.getElementById('hijriMN').textContent=hMonths[mi]+' '+h.y;var key=h.m+'-'+h.d;var ev=islamicEvents[key];var evEl=document.getElementById('islamicEvent');if(ev&&hijriOffset===0){evEl.classList.add('show');document.getElementById('islamicEventText').textContent='Today: '+ev;}else{evEl.classList.remove('show');}}
function changeMonth(d){hijriOffset+=d;updateCal();}
updateCal();

var radioEl=null,curR=0;
var radioUrls={1:'https://n3.radiojar.com/0tpy1h0kxtzuv',2:'https://n3.radiojar.com/8s5u5tpdtwzuv',3:'https://stream.radiojar.com/0tpy1h0kxtzuv',4:'https://n12.radiojar.com/0tpy1h0kxtzuv'};
var radioNames={1:'Makkah Live',2:'Madinah Live',3:'Quran Radio',4:'Al-Quran Al-Kareem'};
function playR(id,e){e.stopPropagation();if(curR===id){stopR();return;}stopR();curR=id;radioEl=new Audio(radioUrls[id]);radioEl.volume=parseFloat(document.querySelector('.vol-sl').value)||0.8;radioEl.play().catch(()=>document.getElementById('radioNow').textContent='Could not connect');document.getElementById('radioNow').textContent='Connecting to '+radioNames[id]+'...';radioEl.addEventListener('playing',()=>document.getElementById('radioNow').textContent='▶ '+radioNames[id]);[1,2,3,4].forEach(i=>{var rs=document.getElementById('rs'+i);var rp=document.getElementById('rp'+i);if(rs)rs.classList.toggle('playing',i===id);if(rp)rp.textContent=i===id?'⏸':'▶';});}
function stopR(){if(radioEl){radioEl.pause();radioEl=null;}curR=0;document.getElementById('radioNow').textContent='';[1,2,3,4].forEach(i=>{var rs=document.getElementById('rs'+i);var rp=document.getElementById('rp'+i);if(rs)rs.classList.remove('playing');if(rp)rp.textContent='▶';});}
function setRVol(v){if(radioEl)radioEl.volume=parseFloat(v);}
</script>
