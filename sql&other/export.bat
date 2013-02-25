mkdir BHN-release
xcopy BlackHoleNav\* BHN-release\ /E /V /R /Y
del /s /f BHN-release\.gitignore
rmdir /s /q BHN-release\nbproject
rmdir /s /q BHN-release\application\cache
rmdir /s /q BHN-release\sql
del /f BHN-release\application\config\database.php