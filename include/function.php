<?php

function matchPassword($password, $passwordR)
{
    if ($password !== $passwordR) {
        return false;
    } else {
        return true;
    }
}


