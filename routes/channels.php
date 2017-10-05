<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
