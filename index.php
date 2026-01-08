<?php
$str_browser_language = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])
  ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',')
  : '';

$str_browser_language = !empty($_GET['language']) ? $_GET['language'] : $str_browser_language;

switch (substr($str_browser_language, 0, 2)) {
  case 'de': $str_language = 'de'; break;
  case 'en': $str_language = 'en'; break;
  default:   $str_language = 'en';
}

$arr_available_languages = [
  ['str_name' => 'English', 'str_token' => 'en'],
  ['str_name' => 'Deutsch', 'str_token' => 'de'],
];

$self = strip_tags($_SERVER['PHP_SELF']);
$str_available_languages = '';
foreach ($arr_available_languages as $arr_language) {
  if ($arr_language['str_token'] !== $str_language) {
    $token = $arr_language['str_token'];
    $name  = $arr_language['str_name'];
    $str_available_languages .= '<a href="'.$self.'?language='.$token.'" hreflang="'.$token.'">'.$name.'</a> | ';
  }
}
$str_available_languages = substr($str_available_languages, 0, -3);

$server_name   = $_SERVER['SERVER_NAME'] ?? '';
$document_root = $_SERVER['DOCUMENT_ROOT'] ?? '';
?>
<!doctype html>
<html lang="<?php echo $str_language; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MAMP PRO</title>

  <!-- Font Awesome (si ton header utilise fa-bars) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS du site -->
  <link rel="stylesheet" href="style.css">

  <!-- CSS spécifique à cette page MAMP -->
  <link rel="stylesheet" href="content/mamp.css">

  <!-- Patch sécurité: menu mobile dropdown full-width (au cas où menu.css ne suffit pas) -->
  <style>
    @media (max-width: 900px){
      .navbar{ position: relative; }
      .navbar .nav-links{
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: var(--brand, #54b454);
        flex-direction: column;
        z-index: 1000;
      }
      .navbar .nav-links.active{ display: flex; }
      .navbar .nav-item a{ width:100%; display:block; }
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/_header.php'; ?>

  <main class="page">
    <header class="header">
      <img src="MAMP-PRO-Logo.png" class="logo" alt="MAMP PRO Logo">
    </header>

    <?php if ($str_language === 'de'): ?>
      <h1 class="title">Der virtuelle <span lang="en">Host</span> wurde erfolgreich eingerichtet.</h1>

      <p class="text">
        Wenn Sie diese Seite sehen, dann bedeutet dies, dass der neue virtuelle
        <span lang="en">Host</span> erfolgreich eingerichtet wurde. Sie können jetzt Ihren
        <span lang="en">Web</span>-Inhalt hinzufügen, diese Platzhalter-Seite
        <sup><a href="#footnote_1">1</a></sup> sollten Sie ersetzen bzw. löschen.
      </p>

      <section class="panel">
        <p class="panel-line">Server-Name: <samp><?php echo $server_name; ?></samp></p>
        <p class="panel-line">Document-Root: <samp><?php echo $document_root; ?></samp></p>
      </section>

      <p class="footnote text" id="footnote_1">
        <small><sup>1</sup> Dateien: <samp>index.php</samp> und <samp>MAMP-PRO-Logo.png</samp></small>
      </p>

      <hr class="sep">
      <p class="text lang-switch">This page in: <?php echo $str_available_languages; ?></p>

    <?php else: ?>
      <h1 class="title">The virtual host was set up successfully.</h1>

      <p class="text">
        If you can see this page, your new virtual host was set up successfully.
        Now, web content can be added and this placeholder page
        <sup><a href="#footnote_1">1</a></sup> should be replaced or deleted.
      </p>

      <section class="panel">
        <p class="panel-line">Server name: <samp><?php echo $server_name; ?></samp></p>
        <p class="panel-line">Document root: <samp><?php echo $document_root; ?></samp></p>
      </section>

      <p class="footnote text" id="footnote_1">
        <small><sup>1</sup> Files: <samp>index.php</samp> and <samp>MAMP-PRO-Logo.png</samp></small>
      </p>

      <hr class="sep">
      <p class="text lang-switch">Diese Seite auf: <?php echo $str_available_languages; ?></p>
    <?php endif; ?>
  </main>

  <?php include __DIR__ . '/_footer.php'; ?>
</body>
</html>
