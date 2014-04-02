<?php
 
//php 5.2 fix... doh, taken from http://www.php.net/manual/en/function.date-diff.php#99942
if (!function_exists('date_diff')) {
 
class DateInterval {
 
public $y;
public $m;
public $d;
public $h;
public $i;
public $s;
public $invert;
 
public function format($format) {
$format = str_replace('%R%y', ($this->invert ? '-' : '+') . $this->y, $format);
$format = str_replace('%R%m', ($this->invert ? '-' : '+') . $this->m, $format);
$format = str_replace('%R%d', ($this->invert ? '-' : '+') . $this->d, $format);
$format = str_replace('%R%h', ($this->invert ? '-' : '+') . $this->h, $format);
$format = str_replace('%R%i', ($this->invert ? '-' : '+') . $this->i, $format);
$format = str_replace('%R%s', ($this->invert ? '-' : '+') . $this->s, $format);
 
$format = str_replace('%y', $this->y, $format);
$format = str_replace('%m', $this->m, $format);
$format = str_replace('%d', $this->d, $format);
$format = str_replace('%h', $this->h, $format);
$format = str_replace('%i', $this->i, $format);
$format = str_replace('%s', $this->s, $format);
$format = str_replace('%a', sprintf("%02d", $this->days), $format);
 
$format = str_replace('%Y', sprintf("%02d", $this->y), $format);
$format = str_replace('%M', sprintf("%02d", $this->m), $format);
$format = str_replace('%D', sprintf("%02d", $this->d), $format);
$format = str_replace('%H', sprintf("%02d", $this->h), $format);
$format = str_replace('%I', sprintf("%02d", $this->i), $format);
$format = str_replace('%S', sprintf("%02d", $this->s), $format);
 
 
return $format;
}
 
}
 
function date_diff(DateTime $date1, DateTime $date2) {
$diff = new DateInterval();
if ($date1 > $date2) {
$tmp = $date1;
$date1 = $date2;
$date2 = $tmp;
$diff->invert = true;
}
 
$diff->y = ((int) $date2->format('Y')) - ((int) $date1->format('Y'));
$diff->m = ((int) $date2->format('n')) - ((int) $date1->format('n'));
if ($diff->m < 0) {
$diff->y -= 1;
$diff->m = $diff->m + 12;
}
$diff->d = ((int) $date2->format('j')) - ((int) $date1->format('j'));
if ($diff->d < 0) {
$diff->m -= 1;
$diff->d = $diff->d + ((int) $date1->format('t'));
}
$diff->h = ((int) $date2->format('G')) - ((int) $date1->format('G'));
if ($diff->h < 0) {
$diff->d -= 1;
$diff->h = $diff->h + 24;
}
$diff->i = ((int) $date2->format('i')) - ((int) $date1->format('i'));
if ($diff->i < 0) {
$diff->h -= 1;
$diff->i = $diff->i + 60;
}
$diff->s = ((int) $date2->format('s')) - ((int) $date1->format('s'));
if ($diff->s < 0) {
$diff->i -= 1;
$diff->s = $diff->s + 60;
}
$diff->days = (int) floor(((int) $date2->format('U') - (int) $date1->format('U')) / 86400);
 
return $diff;
}
}
 