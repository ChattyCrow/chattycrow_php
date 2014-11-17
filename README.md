[![Chatty
Crow](http://chattycrow.com/crow3logo.png)](http://chattycrow.com)

# ChattyCrow - PHP library

## Instalation

1. Install composer

```sh
curl -s https://getcomposer.org/installer | php
```

2. Add chattycrow as a dependency to your *composer.json*

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url":  "git@github.com:ChattyCrow/chattycrow_php.git"
    }
  ],
  "require": {
    "netbrick/chatty-crow": "*"
  }
}
```

3. Install ChattyCrow

```sh
php composer.phar install
```
