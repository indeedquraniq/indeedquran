<?php
require_once 'data.php';
$slug = $_GET['slug'] ?? '';
$surah = getSurahBySlug($slug, $surahs);
if(!$surah){header('Location: /listen-quran/');exit;}
$num = $surah['number'];
$page_title = 'Surah '.$surah['en'].' — Listen & Download MP3 Free | Indeed Qur\'an';
$page_desc = 'Listen to Surah '.$surah['en'].' ('.$surah['ar'].') with 230+ reciters. Download Surah '.$surah['en'].' MP3 free. English, Urdu, Bengali translation. '.$surah['benefit'];
$page_keywords = 'surah '.$surah['slug'].' mp3, listen surah '.$surah['slug'].' online, download surah '.$surah['slug'].' mp3 free, surah '.$surah['slug'].' sudais, surah '.$surah['slug'].' mishary, surah '.$surah['slug'].' urdu translation, '.strtolower($surah['en']).' mp3';
$page_url = 'https://indeedquran.com/surah/'.$surah['slug'].'/';
require_once 'header.php';
?>
<style>
.s-hero{padding:48px 60px 36px;background:var(--card);border-bottom:1px solid var(--border);}
@media(max-width:700px){.s-hero{padding:24px 18px;}}
.s-breadcrumb{font-size:12px;color:var(--dim);margin-bottom:16px;}
.s-breadcrumb a{color:var(--cyan);text-decoration:none;}
.s-hero-row{display:flex;align-items:flex-start;gap:28px;flex-wrap:wrap;}
.s-hero-num{width:90px;height:90px;border-radius:18px;background:var(--cyan2);border:2px solid var(--cyan3);display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0;}
.shn-lbl{font-size:10px;color:var(--dim);letter-spacing:.06em;}
.shn-n{font-family:'Cinzel',serif;font-size:32px;font-weight:700;color:var(--cyan);}
.s-hero-info{flex:1;}
.s-h1{font-family:'Cinzel',serif;font-size:32px;font-weight:700;color:var(--text);margin-bottom:4px;}
.s-h1-ar{font-family:'Scheherazade New',serif;font-size:28px;color:var(--cyan);margin-bottom:10px;direction:rtl;}
.s-tags{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px;}
.s-tag{font-size:12px;padding:5px 14px;border-radius:20px;background:var(--cyan2);border:1px solid var(--cyan3);color:var(--cyan);}
.s-benefit{font-size:15px;color:var(--muted);line-height:1.7;padding:14px;background:var(--navy3);border-radius:10px;border-left:3px solid var(--cyan);}
.rc-pick{padding:32px 60px;border-bottom:1px solid var(--border);}
@media(max-width:700px){.rc-pick{padding:20px 18px;}}
.rp-title{font-family:'Cinzel',serif;font-size:20px;color:var(--text);margin-bottom:6px;}
.rp-sub{font-size:14px;color:var(--muted);margin-bottom:20px;}
.rp-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px;}
.rp-card{background:var(--card);border-radius:12px;padding:16px;border:1px solid var(--border);cursor:pointer;transition:.2s;text-align:center;}
.rp-card:hover,.rp-card.sel{border-color:var(--cyan);background:var(--cyan2);}
.rp-av{width:56px;height:56px;border-radius:50%;background:rgba(0,80,100,.3);border:2px solid var(--cyan3);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;color:var(--cyan);margin:0 auto 10px;}
.rp-card.sel .rp-av{border-color:var(--cyan);}
.rp-name{font-size:13px;font-weight:600;color:var(--text);margin-bottom:3px;}
.rp-type{font-size:11px;color:var(--muted);}
.rp-play{font-size:12px;color:var(--cyan);background:var(--cyan2);border-radius:20px;padding:5px 16px;margin-top:10px;display:inline-block;border:1px solid var(--cyan3);}
.s-player{position:fixed;bottom:0;left:0;right:0;background:var(--card);border-top:2px solid var(--cyan);padding:14px 40px;z-index:50;display:none;}
.s-player.show{display:block;}
@media(max-width:700px){.s-player{padding:12px 16px;}}
.sp-row1{display:flex;align-items:center;gap:12px;margin-bottom:8px;flex-wrap:wrap;}
.sp-info{flex:1;}
.sp-rc{font-size:13px;font-weight:600;color:var(--cyan);}
.sp-su{font-size:12px;color:var(--muted);margin-top:2px;}
.sp-ctrls{display:flex;align-items:center;gap:10px;}
.sp-btn{width:32px;height:32px;border-radius:50%;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12px;color:var(--muted);background:none;}
.sp-play{width:44px;height:44px;border-radius:50%;background:var(--cyan2);border:1.5px solid var(--cyan);display:flex;align-items:center;justify-content:center;cursor:pointer;}
.sp-tri{width:0;height:0;border-style:solid;border-width:9px 0 9px 16px;border-color:transparent transparent transparent var(--cyan);margin-left:3px;}
.sp-pause{display:flex;gap:4px;}.sp-pb{width:4px;height:16px;background:var(--cyan);border-radius:2px;}
.prog-wrap{display:flex;align-items:center;gap:10px;margin-bottom:6px;}
.prog{flex:1;height:4px;background:rgba(0,200,232,.12);border-radius:2px;cursor:pointer;position:relative;}
.prog-fill{height:100%;background:var(--cyan);border-radius:2px;width:0%;}
.prog-dot{width:10px;height:10px;border-radius:50%;background:var(--cyan);position:absolute;top:50%;left:0%;transform:translate(-50%,-50%);}
.time{font-size:11px;color:var(--dim);min-width:32px;font-variant-numeric:tabular-nums;}
.extra-row{display:flex;align-items:center;gap:10px;}
.vol-row{display:flex;align-items:center;gap:6px;flex:1;}
.vol-sl{flex:1;accent-color:var(--cyan);}
.dl-btn{font-size:12px;color:#0A0E1A;background:var(--cyan);border-radius:20px;padding:6px 18px;cursor:pointer;border:none;font-family:'Inter',sans-serif;font-weight:600;}
.spd{font-size:10px;padding:3px 9px;border-radius:20px;border:1px solid var(--border);color:var(--muted);cursor:pointer;transition:.2s;}
.spd.on{border-color:var(--cyan3);color:var(--cyan);}
body{padding-bottom:160px;}
.other-surahs{padding:40px 60px;}
@media(max-width:700px){.other-surahs{padding:24px 18px;}}
.os-title{font-family:'Cinzel',serif;font-size:20px;color:var(--text);margin-bottom:16px;}
.os-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:10px;}
.os-link{background:var(--card);border-radius:10px;padding:12px 16px;border:1px solid var(--border);text-decoration:none;transition:.2s;}
.os-link:hover{border-color:var(--cyan3);}
.os-ar{font-family:'Scheherazade New',serif;font-size:18px;color:var(--text);}
.os-en{font-size:12px;color:var(--muted);margin-top:3px;}
</style>

<div class="s-hero">
  <div class="s-breadcrumb"><a href="/">Home</a> › <a href="/listen-quran/">Listen Quran</a> › Surah <?= $surah['en'] ?></div>
  <div class="s-hero-row">
    <div class="s-hero-num">
      <div class="shn-lbl">SURAH</div>
      <div class="shn-n"><?= $num ?></div>
    </div>
    <div class="s-hero-info">
      <h1 class="s-h1">Surah <?= $surah['en'] ?></h1>
      <div class="s-h1-ar"><?= $surah['ar'] ?></div>
      <div class="s-tags">
        <span class="s-tag"><?= $surah['ayahs'] ?> Ayahs</span>
        <span class="s-tag"><?= $surah['type'] ?></span>
        <span class="s-tag"><?= $surah['meaning'] ?></span>
        <span class="s-tag">Juz <?= ceil($num/4) ?></span>
      </div>
      <div class="s-benefit">🌟 <?= htmlspecialchars($surah['benefit']) ?></div>
    </div>
  </div>
</div>

<div class="rc-pick">
  <h2 class="rp-title">Choose a Reciter to Listen</h2>
  <p class="rp-sub">Select any reciter below to listen to Surah <?= $surah['en'] ?> and download the MP3 for free.</p>
  <div class="rp-grid">
    <?php foreach($reciters as $r):
      $ini = strtoupper(substr($r['name'],0,1)).strtoupper(substr(explode(' ',$r['name'])[1]??'',0,1));
    ?>
    <div class="rp-card" onclick="pickRc('<?= addslashes($r['name']) ?>','<?= $r['type'] ?>','<?= $r['server'] ?>','<?= $ini ?>',this)">
      <div class="rp-av"><?= $ini ?></div>
      <div class="rp-name"><?= htmlspecialchars($r['name']) ?></div>
      <div class="rp-type"><?= htmlspecialchars($r['type']) ?></div>
      <div class="rp-play">▶ Play Surah <?= $surah['en'] ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Fixed player -->
<div class="s-player" id="sPlayer">
  <div class="sp-row1">
    <div class="sp-info">
      <div class="sp-rc" id="spRc">—</div>
      <div class="sp-su" id="spSu">Surah <?= $surah['en'] ?> • <?= $surah['ar'] ?></div>
    </div>
    <div class="sp-ctrls">
      <button class="sp-btn" onclick="seekBack()">⏪</button>
      <div class="sp-play" onclick="togglePlay()"><div id="playIcon"><div class="sp-tri"></div></div></div>
      <button class="sp-btn" onclick="seekFwd()">⏩</button>
      <button class="dl-btn" onclick="dlNow()">⬇ Download MP3</button>
    </div>
  </div>
  <div class="prog-wrap">
    <span class="time" id="tCur">0:00</span>
    <div class="prog" onclick="seekTo(event,this)"><div class="prog-fill" id="progFill"></div><div class="prog-dot" id="progDot"></div></div>
    <span class="time" id="tDur">--:--</span>
  </div>
  <div class="extra-row">
    <div class="vol-row"><span style="font-size:12px;color:var(--dim)">🔉</span><input type="range" class="vol-sl" id="volSl" min="0" max="1" step="0.05" value="0.85" oninput="setVol(this.value)"><span style="font-size:12px;color:var(--dim)">🔊</span></div>
    <div class="spd" onclick="setSpd(0.75,this)">0.75×</div>
    <div class="spd on" onclick="setSpd(1,this)">1×</div>
    <div class="spd" onclick="setSpd(1.25,this)">1.25×</div>
    <div class="spd" onclick="setSpd(1.5,this)">1.5×</div>
  </div>
</div>

<div class="other-surahs">
  <h2 class="os-title">More Surahs</h2>
  <div class="os-grid">
    <?php
    $prev = $num > 1 ? $surahs[$num-1] : null;
    $next = $num < 114 ? $surahs[$num+1] : null;
    $popular = [18,36,55,56,67,112,113,114];
    $show = array_filter($surahs, fn($n) => in_array($n, $popular), ARRAY_FILTER_USE_KEY);
    if($prev): ?>
    <a class="os-link" href="/surah/<?= $prev['slug'] ?>/"><div class="os-ar">← <?= $prev['ar'] ?></div><div class="os-en">Previous: <?= $prev['en'] ?></div></a>
    <?php endif; if($next): ?>
    <a class="os-link" href="/surah/<?= $next['slug'] ?>/"><div class="os-ar"><?= $next['ar'] ?> →</div><div class="os-en">Next: <?= $next['en'] ?></div></a>
    <?php endif;
    foreach($show as $n => $s): if($n===$num) continue; ?>
    <a class="os-link" href="/surah/<?= $s['slug'] ?>/"><div class="os-ar"><?= $s['ar'] ?></div><div class="os-en">Surah <?= $s['en'] ?></div></a>
    <?php endforeach; ?>
  </div>
</div>

<script>
var auEl=null,auPlaying=false,auSpd=1;
var curServer='',curRcName='';
var surahNum=<?= $num ?>;
var surahName='<?= addslashes($surah['en']) ?>';

function pickRc(name,type,server,ini,el){
  curRcName=name;curServer=server;
  document.querySelectorAll('.rp-card').forEach(c=>c.classList.remove('sel'));
  el.classList.add('sel');
  document.getElementById('spRc').textContent=name+' — '+type;
  document.getElementById('spSu').textContent='Surah '+surahName+' • Loading...';
  document.getElementById('sPlayer').classList.add('show');
  if(auEl){auEl.pause();auEl=null;}resetProg();
  var n=String(surahNum).padStart(3,'0');
  auEl=new Audio(server+n+'.mp3');
  auEl.playbackRate=auSpd;auEl.volume=parseFloat(document.getElementById('volSl').value);
  auEl.addEventListener('loadedmetadata',()=>document.getElementById('tDur').textContent=fmt(auEl.duration));
  auEl.addEventListener('timeupdate',()=>{
    if(!auEl.duration)return;
    var p=(auEl.currentTime/auEl.duration)*100;
    document.getElementById('progFill').style.width=p+'%';
    document.getElementById('progDot').style.left=p+'%';
    document.getElementById('tCur').textContent=fmt(auEl.currentTime);
  });
  auEl.addEventListener('playing',()=>{setPlay(true);document.getElementById('spSu').textContent='Surah '+surahName+' • Playing';});
  auEl.addEventListener('pause',()=>setPlay(false));
  auEl.addEventListener('ended',()=>{setPlay(false);document.getElementById('spSu').textContent='Surah '+surahName+' • Finished';});
  auEl.addEventListener('error',()=>{document.getElementById('spSu').textContent='Could not load — check connection';setPlay(false);});
  auEl.play().catch(()=>{document.getElementById('spSu').textContent='Tap ▶ to play';setPlay(false);});
}
function togglePlay(){if(!auEl)return;if(auEl.paused)auEl.play().then(()=>setPlay(true));else{auEl.pause();setPlay(false);}}
function setPlay(p){auPlaying=p;document.getElementById('playIcon').innerHTML=p?'<div class="sp-pause"><div class="sp-pb"></div><div class="sp-pb"></div></div>':'<div class="sp-tri"></div>';}
function resetProg(){document.getElementById('progFill').style.width='0%';document.getElementById('progDot').style.left='0%';document.getElementById('tCur').textContent='0:00';document.getElementById('tDur').textContent='--:--';}
function seekBack(){if(auEl)auEl.currentTime=Math.max(0,auEl.currentTime-10);}
function seekFwd(){if(auEl&&auEl.duration)auEl.currentTime=Math.min(auEl.duration,auEl.currentTime+10);}
function seekTo(e,el){if(!auEl||!auEl.duration)return;var r=el.getBoundingClientRect();auEl.currentTime=((e.clientX-r.left)/r.width)*auEl.duration;}
function setVol(v){if(auEl)auEl.volume=parseFloat(v);}
function setSpd(s,el){auSpd=s;if(auEl)auEl.playbackRate=s;document.querySelectorAll('.spd').forEach(b=>b.classList.remove('on'));el.classList.add('on');}
function dlNow(){if(!curServer)return;var n=String(surahNum).padStart(3,'0');var a=document.createElement('a');a.href=curServer+n+'.mp3';a.download='IndeedQuran-Surah-'+surahName+'-'+curRcName+'.mp3';a.click();}
function fmt(s){if(!s||isNaN(s))return'0:00';var h=Math.floor(s/3600),m=Math.floor((s%3600)/60),sc=Math.floor(s%60);return h>0?h+':'+pd(m)+':'+pd(sc):m+':'+pd(sc);}
function pd(n){return n<10?'0'+n:''+n;}
</script>

<?php require_once 'footer.php'; ?>
