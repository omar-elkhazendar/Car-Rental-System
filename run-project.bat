@echo off
setlocal

set "PROJECT_URL=http://localhost/AutoMotors/public/login"
set "XAMPP_CONTROL=C:\xampp\xampp-control.exe"

echo ===============================================
echo        Car Rental System Project Launcher
echo ===============================================
echo.

if exist "%XAMPP_CONTROL%" (
    echo Opening XAMPP Control Panel...
    start "" "%XAMPP_CONTROL%"
    timeout /t 2 /nobreak >nul
) else (
    echo XAMPP Control Panel was not found at:
    echo %XAMPP_CONTROL%
    echo.
)

echo Opening project URL...
start "" "%PROJECT_URL%"

echo.
echo If the page does not load:
echo 1) Start Apache and MySQL from XAMPP Control Panel
echo 2) Import car_rental.sql in phpMyAdmin
echo 3) Run this file again
echo.
pause

