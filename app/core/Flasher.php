<?php

class Flasher
{
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div style="color: ' . $_SESSION['flash']['tipe'] . ' ;">
                    <strong>' . $_SESSION['flash']['pesan'] . '</strong>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}
