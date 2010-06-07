<?php
/**
 * 
 * This software is distributed under the GNU LGPL v3.0 license.
 * @author Gemorroj
 * @copyright 2008-2010 http://wapinet.ru
 * @license http://www.gnu.org/licenses/lgpl-3.0.txt
 * @link http://wapinet.ru/gmanager/
 * @version 0.7.4 beta
 * PHP version >= 5.2.1
 * 
 */



require 'config.php';


if ($Gmanager->current == '.') {
    $Gmanager->hCurrent = htmlspecialchars($Gmanager->getcwd(), ENT_COMPAT);
}


$type = $Gmanager->get_type(basename($Gmanager->hCurrent));
$archive = $Gmanager->is_archive($type);
$f = 0;
$if = isset($_GET['f']);
$ia = isset($_GET['add_archive']);

$Gmanager->sendHeader();

echo str_replace('%dir%', rawurldecode($Gmanager->hCurrent), $GLOBALS['top']) . '<div class="w2">' . $GLOBALS['lng']['title_index'] . '<br/></div>' . $Gmanager->head();

if ($GLOBALS['string']) {
    echo '<div><form action="index.php?" method="get"><div>';
    if ($ia) {
        echo '<input type="hidden" name="add_archive" value="' . rawurlencode($_GET['add_archive']) . '"/><input type="hidden" name="go" value="1"/>';
    }
    echo '<input type="text" name="c" value="' . $Gmanager->hCurrent . '"/><br/><input type="submit" value="' . $GLOBALS['lng']['go'] . '"/></div></form></div>';
}

if ($idown = isset($_GET['down'])) {
    $down = '&amp;up';
    $mnem = '&#171;';
} else {
    $down = '&amp;down';
    $mnem = '&#187;';
}

if (!$if) {
    if (!$archive) {

        $itype = '';

        if (isset($_GET['time'])) {
            $itype = 'time';
            echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;type">' . $GLOBALS['lng']['type'] . '</a></th>' : '') . ($GLOBALS['index']['size'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;size">' . $GLOBALS['lng']['size'] . '</a></th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;chmod">' . $GLOBALS['lng']['chmod'] . '</a></th>' : '') . ($GLOBALS['index']['date'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . '&amp;time' . $down . '">' . $GLOBALS['lng']['date'] . '</a></th>' : '') . ($GLOBALS['index']['uid'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;uid">' . $GLOBALS['lng']['uid'] . '</a></th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
        } else if (isset($_GET['type'])) {
            $itype = 'type';
            echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . '&amp;type' . $down . '">' . $GLOBALS['lng']['type'] . '</a></th>' : '') . ($GLOBALS['index']['size'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;size">' . $GLOBALS['lng']['size'] . '</a></th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;chmod">' . $GLOBALS['lng']['chmod'] . '</a></th>' : '') . ($GLOBALS['index']['date'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;time">' . $GLOBALS['lng']['date'] . '</a></th>' : '') . ($GLOBALS['index']['uid'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;uid">' . $GLOBALS['lng']['uid'] . '</a></th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
        } else if (isset($_GET['size'])) {
            $itype = 'size';
            echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;type">' . $GLOBALS['lng']['type'] . '</a></th>' : '') . ($GLOBALS['index']['size'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . '&amp;size' . $down . '">' . $GLOBALS['lng']['size'] . '</a></th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;chmod">' . $GLOBALS['lng']['chmod'] . '</a></th>' : '') . ($GLOBALS['index']['date'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;time">' . $GLOBALS['lng']['date'] . '</a></th>' : '') . ($GLOBALS['index']['uid'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;uid">' . $GLOBALS['lng']['uid'] . '</a></th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
        } else if (isset($_GET['chmod'])) {
            $itype = 'chmod';
            echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;type">' . $GLOBALS['lng']['type'] . '</a></th>' : '') . ($GLOBALS['index']['size'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;size">' . $GLOBALS['lng']['size'] . '</a></th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . '&amp;chmod' . $down . '">' . $GLOBALS['lng']['chmod'] . '</a></th>' : '') . ($GLOBALS['index']['date'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;time">' . $GLOBALS['lng']['date'] . '</a></th>' : '') . ($GLOBALS['index']['uid'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;uid">' . $GLOBALS['lng']['uid'] . '</a></th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
        } else if (isset($_GET['uid'])) {
            $itype = 'chmod';
            echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;type">' . $GLOBALS['lng']['type'] . '</a></th>' : '') . ($GLOBALS['index']['size'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;size">' . $GLOBALS['lng']['size'] . '</a></th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;chmod">' . $GLOBALS['lng']['chmod'] . '</a></th>' : '') . ($GLOBALS['index']['date'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;time">' . $GLOBALS['lng']['date'] . '</a></th>' : '') . ($GLOBALS['index']['uid'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . '&amp;uid' . $down . '">' . $GLOBALS['lng']['uid'] . '</a></th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
        } else {
            $itype = '';
            echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . $down . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;type">' . $GLOBALS['lng']['type'] . '</a></th>' : '') . ($GLOBALS['index']['size'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;size">' . $GLOBALS['lng']['size'] . '</a></th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;chmod">' . $GLOBALS['lng']['chmod'] . '</a></th>' : '') . ($GLOBALS['index']['date'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;time">' . $GLOBALS['lng']['date'] . '</a></th>' : '') . ($GLOBALS['index']['uid'] ? '<th><a href="?c=' . $Gmanager->rCurrent . '&amp;uid">' . $GLOBALS['lng']['uid'] . '</a></th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
        }
    } else if ($archive != 'GZ') {
        echo '<form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div class="telo"><table><tr><th>' . $GLOBALS['lng']['ch_index'] . '</th>' . ($GLOBALS['index']['name'] ? '<th>' . $mnem . ' <a href="?c=' . $Gmanager->rCurrent . $down . '">' . $GLOBALS['lng']['name'] . '</a></th>' : '') . ($GLOBALS['index']['down'] ? '<th>' . $GLOBALS['lng']['get'] . '</th>' : '') . ($GLOBALS['index']['type'] ? '<th>' . $GLOBALS['lng']['type'] . '</th>' : '') . ($GLOBALS['index']['size'] ? '<th>' . $GLOBALS['lng']['size'] . '</th>' : '') . ($GLOBALS['index']['change'] ? '<th>' . $GLOBALS['lng']['change'] . '</th>' : '') . ($GLOBALS['index']['del'] ? '<th>' . $GLOBALS['lng']['del'] . '</th>' : '') . ($GLOBALS['index']['chmod'] ? '<th>' . $GLOBALS['lng']['chmod'] . '</th>' : '') . ($GLOBALS['index']['date'] ? '<th>' . $GLOBALS['lng']['date'] . '</th>' : '') . ($GLOBALS['index']['uid'] ? '<th>' . $GLOBALS['lng']['uid'] . '</th>' : '') . ($GLOBALS['index']['n'] ? '<th>' . $GLOBALS['lng']['n'] . '</th>' : '') . '</tr>';
    }
}

if ($archive == 'ZIP') {
    if ($if) {
        echo $Gmanager->look_zip_file($Gmanager->current, $_GET['f']);
    } else {
        echo $Gmanager->list_zip_archive($Gmanager->current, $idown);
        $f = 1;
    }
} else if ($archive == 'TAR') {
    if ($if) {
        echo $Gmanager->look_tar_file($Gmanager->current, $_GET['f']);
    } else {
        echo $Gmanager->list_tar_archive($Gmanager->current, $idown);
        $f = 1;
    }
} else if ($archive == 'GZ') {
    echo $Gmanager->gz($Gmanager->current) . '<div class="ch"><form action="change.php?c=' . $Gmanager->rCurrent . '&amp;go=1" method="post"><div><input type="submit" name="gz_extract" value="' . $GLOBALS['lng']['extract_archive'] . '"/></div></form></div>';
    $if = true;
} else if ($archive == 'RAR' && extension_loaded('rar')) {
    if ($if) {
        echo $Gmanager->look_rar_file($Gmanager->current, $_GET['f']);
    } else {
        echo $Gmanager->list_rar_archive($Gmanager->current, $idown);
        $f = 1;
    }
} else {
    $Gmanager->look($Gmanager->current, $itype, $idown);
}

if (!$if) {
    echo '<tr><td class="w" colspan="' . (array_sum($GLOBALS['index']) + 1) . '" style="text-align:left;padding:0 0 0 1%;"><input type="checkbox" value="check" onclick="check(this.form,\'check[]\',this.checked)"/> ' . $GLOBALS['lng']['check'] . '</td></tr>';
}


if ($Gmanager->file_exists($Gmanager->current) || $Gmanager->is_link($Gmanager->current)) {
    if ($archive) {
        $d = str_replace('%2F', '/', rawurlencode(dirname($Gmanager->current)));
        $found = '<div class="rb">' . $GLOBALS['lng']['create'] . ' <a href="change.php?go=create_file&amp;c=' . $d . '">' . $GLOBALS['lng']['file'] . '</a> / <a href="change.php?go=create_dir&amp;c=' . $d . '">' . $GLOBALS['lng']['dir'] . '</a><br/></div><div class="rb"><a href="change.php?go=upload&amp;c=' . $d . '">' . $GLOBALS['lng']['upload'] . '</a><br/></div><div class="rb"><a href="change.php?go=mod&amp;c=' . $d . '">' . $GLOBALS['lng']['mod'] . '</a><br/></div>';
    } else {
        $found = '<form action="' . $_SERVER['PHP_SELF'] . '?' . htmlspecialchars($_SERVER['QUERY_STRING'], ENT_COMPAT, 'UTF-8') . '" method="post"><div><input name="limit" value="' . $GLOBALS['limit'] . '" type="text" onkeypress="return number(event)" style="-wap-input-format:\'*N\';width:2%;"/><input type="submit" value="' . $GLOBALS['lng']['limit'] . '"/></div></form><div class="rb">' . $GLOBALS['lng']['create'] . ' <a href="change.php?go=create_file&amp;c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['file'] . '</a> / <a href="change.php?go=create_dir&amp;c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['dir'] . '</a><br/></div><div class="rb"><a href="change.php?go=upload&amp;c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['upload'] . '</a><br/></div><div class="rb"><a href="change.php?go=mod&amp;c=' . $Gmanager->rCurrent . '">' . $GLOBALS['lng']['mod'] . '</a><br/></div>';
    }
} else {
    $found = '<div class="red">' . $GLOBALS['lng']['not_found'] . '(' . $Gmanager->hCurrent . ')' . '<br/></div>';
}


$tm = '<div class="rb">' . round(microtime(true) - $ms, 4) . '<br/></div>';

if (!$if && !$f && !$ia) {
    echo '</table><div class="ch"><input type="submit" name="full_chmod" value="' .$GLOBALS['lng']['chmod'] . '"/><input' . ($GLOBALS['del_notify'] ? ' onclick="return confirm(\'' . $GLOBALS['lng']['del_notify'] . '\')"' : '') . ' type="submit" name="full_del" value="' . $GLOBALS['lng']['del'] . '"/><input type="submit" name="full_rename" value="' . $GLOBALS['lng']['change'] . '"/><input type="submit" name="fname" value="' . $GLOBALS['lng']['rename'] . '"/><input type="submit" name="create_archive" value="' . $GLOBALS['lng']['create_archive'] . '"/></div></div></form>' . $found . $tm . $GLOBALS['foot'];
} else if ($f) {
    echo '</table><div class="ch"><input type="submit" name="full_extract" value="' . $GLOBALS['lng']['extract_file'] . '"/><input type="submit" name="mega_full_extract" value="' . $GLOBALS['lng']['extract_archive'] . '"/>';
    if ($type != 'RAR') {
        echo ' <input type="submit" name="add_archive" value="' . $GLOBALS['lng']['add_archive'] . '"/> <input type="submit" name="del_archive" value="' . $GLOBALS['lng']['del'] . '"/>';
    }
    echo '</div></div></form>' . $found . $tm . $GLOBALS['foot'];
} else if ($ia) {
    echo '</table><div class="ch"><input type="hidden" name="add_archive" value="' . rawurlencode($_GET['add_archive']) . '"/><input type="submit" name="name" value="' . $GLOBALS['lng']['add_archive'] . '"/></div></div></form>' . $found . $tm . $GLOBALS['foot'];
} else {
    echo $found . $tm . $GLOBALS['foot'];
}

?>
