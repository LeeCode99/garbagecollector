<HTML>

<HEAD>
    <TITLE>Health Facility Employee Status Tracking System</TITLE>
</HEAD>

<BODY>
<h1>Health Facility Employee Status Tracking System</h1>
<?php include "menu.php"?>
<h2>Vaccination Information</h2>
<?php
$servername = "qac353.encs.concordia.ca";
$username = "qac353_4";
$password = "ptkg7903";
$dbname = "qac353_4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select Vaccination_Reference_Num, VaccineType from Vaccines;";
$result = $conn->query($sql);

@echo off

set "folder=C:\path\to\your\folder"
set "file_limit=5"

REM Get the number of files in the folder
for /f %%i in ('dir /b /a-d "%folder%" ^| find /c /v ""') do set "file_count=%%i"

REM Calculate the number of files to delete
set /a "files_to_delete=file_count - file_limit"

REM If there are more files than the limit, delete the excess files
if %files_to_delete% gtr 0 (
    for /f "skip=%files_to_delete% delims=" %%f in ('dir /b /a-d /o-d "%folder%"') do (
        echo Deleting "%%f"
        del "%folder%\%%f"
    )
) else (
    echo No files to delete.
)
