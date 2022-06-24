<?php 

/**
 * Digunakan untuk mengenkripsi pesan plaintext menjadi teks terenkripsi dengan kunci tertentu
 */
function enkripsi($plainText, $key)
{
    $plainText = strtoupper($plainText);
    $plainText = preg_replace('/[^A-Z]+/', '', $plainText);

    $string = '';

    $key = strtoupper($key);
    $key = preg_replace('/[^A-Z]+/', '', $key);

    $alfabetSatu    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alfabetDua     = ' ' . $key;
    $alfabetDuaString = '';

    for ($h=0; $h < strlen($alfabetDua); $h++) { 
        $huruf = substr($alfabetDua, $h, 1);

        if(!strpos($alfabetDuaString, $huruf))
        {
            $alfabetDuaString.= $huruf;
        }
    }

    $alfabetDua = $alfabetDuaString;

    for ($i=0; $i < strlen($alfabetSatu); $i++) { 
        $huruf = substr($alfabetSatu, $i, 1);

        if(!strpos($alfabetDua, $huruf))
        {
            $alfabetDua.= $huruf;
        }
    }

    $alfabetDua = trim($alfabetDua);

    for ($j=0; $j < strlen($plainText); $j++) { 
        $huruf = substr($plainText, $j, 1);
        $posisi = strpos($alfabetSatu, $huruf);

        $string.= substr($alfabetDua, $posisi, 1);
    }

    return $string;
}

/**
 * Digunakan unguk mendekripsi sebuah string terenkripsi dengan kunci tertentu
 */
function dekripsi($chiperText, $key)
{
    $string = '';

    $key = strtoupper($key);
    $key = preg_replace('/[^A-Z]+/', '', $key);

    $alfabetSatu    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alfabetDua     = ' ' . $key;
    $alfabetDuaString = '';

    for ($h=0; $h < strlen($alfabetDua); $h++) { 
        $huruf = substr($alfabetDua, $h, 1);

        if(!strpos($alfabetDuaString, $huruf))
        {
            $alfabetDuaString.= $huruf;
        }
    }

    $alfabetDua = $alfabetDuaString;

    for ($i=0; $i < strlen($alfabetSatu); $i++) { 
        $huruf = substr($alfabetSatu, $i, 1);

        if(!strpos($alfabetDua, $huruf))
        {
            $alfabetDua.= $huruf;
        }
    }

    $alfabetDua = trim($alfabetDua);

    for ($j=0; $j < strlen($chiperText); $j++) { 
        $huruf = substr($chiperText, $j, 1);
        $posisi = strpos($alfabetDua, $huruf);

        $string.= substr($alfabetSatu, $posisi, 1);
    }

    return $string;
}

function Cipher($ch, $key)
{
    if (!ctype_alpha($ch))
        return $ch;
    $offset = ord(ctype_upper($ch) ? 'A' : 'a');
    return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function Encipher($input, $key)
{
    $output = "";

    $inputArr = str_split($input);
    foreach ($inputArr as $ch)
        $output .= Cipher($ch, $key);

    return $output;
}

function Decipher($input, $key)
{
    return Encipher($input, 26 - $key);
}