<?php
/**
 *
 */

// Ambil data
$patternFile = __DIR__ . '/../pattern-summary.txt';
$fileContent = file_get_contents($patternFile);
preg_match_all("/(.+) > (.+)/m", $fileContent, $matches);

// Atur dalam array
$patternCount = count($matches[0]);
for ($i = 0; $i < $patternCount; $i++) {
    $patterns[] = array($matches[1][$i], $matches[2][$i]);
}

// Kelompokkan
foreach ($patterns as $pattern) {
    list($affix, $pos) = $pattern;
    $poses[$pos][] = $affix;
    $affixes[$affix][] = $pos;
}

// Tampilkan semua pola
$ret .= '<table>';
foreach ($patterns as $pattern) {
    list($affix, $pos) = $pattern;
    $ret .= '<tr>';
    $ret .= "<td>{$affix}</td>";
    $ret .= "<td>{$pos}</td>";
    $ret .= '</tr>';
}
$ret .= '</table>';
echo $ret;
