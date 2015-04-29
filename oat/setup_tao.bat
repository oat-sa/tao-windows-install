@ECHO OFF
if "%1" == "sfx" (
    cd xampp
)

if exist php\php.exe GOTO Normal
if not exist php\php.exe GOTO Abort


:Abort
echo Sorry ... cannot find php cli!
echo Must abort these process!
pause
GOTO END

:Normal
set PHP_BIN=php\php.exe
set CONFIG_PHP=htdocs\tao\scripts\taoInstall.php
%PHP_BIN% -d output_buffering=0 -q %CONFIG_PHP% --db_driver pdo_mysql --db_host localhost --db_name tao30win --db_user root --module_host http://localhost:89/ --module_name tao --module_namespace http://localhost/tao.rdf --module_url http://localhost:89/ --user_login demo --user_pass demo
%PHP_BIN% -d output_buffering=0 -q oat\activateDemo.php htdocs
GOTO END

:END
