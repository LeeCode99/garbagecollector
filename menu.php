<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    /* Change the link color to #111 (black) on hover */
    li a:hover {
        background-color: #111;
    }
</style>
<ul>
    <li><a href="Employee.php">Employee</a></li>
    <li><a href="Facility.php">Facility</a></li>
    <li><a href="Infection.php">Infection</a> </li>
    <li><a href="Vaccination.php">Vaccination</a> </li>
    <li><a href="Schedule.php">Schedule</a></li>
</ul>

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

