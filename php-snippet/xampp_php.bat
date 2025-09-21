@echo off
setlocal
set "XAMPP_PATH=C:\xampp"

echo ---------------------------------------------------------------------
echo This script will add the XAMPP PHP directory to your system's PATH.
echo ---------------------------------------------------------------------
echo.

:: Check if the path exists. If not, inform the user and exit.
if not exist "%XAMPP_PATH%\php" (
echo ERROR: The XAMPP PHP path does not exist at the default location.
echo Please open this file in a text editor and change the "XAMPP_PATH"
echo variable to your correct XAMPP installation directory.
echo.
pause
exit /b 1
)

echo Found XAMPP installation.
echo Adding "%XAMPP_PATH%\php" to the system PATH environment variable...
echo.

:: Use SETX to permanently modify the system PATH.
:: We append the new path to the existing PATH variable.
setx PATH "%PATH%;%XAMPP_PATH%\php" /M

echo.
echo Success! The PHP path has been added to your system environment variables.
echo.
echo IMPORTANT: You must restart any open Command Prompt or PowerShell windows
echo            for the change to take effect.
echo.
pause
endlocal
