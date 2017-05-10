<?php

namespace TecBeast\BasicAuthWithEnv;

class Authenticator
{

    public function auth()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            $this->showLoginForm();
        } else {
            if ($this->check()) {
                return; // Auth successful
            }

            // Auth fail
            $this->showLoginForm();
        }
    }

    /**
     * Shows the basic auth login form
     * @return void
     */
    protected function showLoginForm()
    {
        header('WWW-Authenticate: Basic realm="Private"');
        $this->reset('Login aborted.');
    }

    /**
     * Checks if the provided user and password is valid
     * @return bool true if valid login else false
     */
    protected function check()
    {
        foreach (config('basic-auth.users') as $user) {
            if ($user['user'] === $_SERVER['PHP_AUTH_USER'] && $user['password'] === $_SERVER['PHP_AUTH_PW']) {
                return true;
            }
        }

        return false;
    }

    /**
     * Resets the PHP_AUTH variables and exits the application
     * @param  string $message the text message to be displayed on the page
     * @return void
     */
    protected function reset($message)
    {
        header('HTTP/1.1 401 Unauthorized');
        die($message);
    }
}
