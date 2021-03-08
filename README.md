# Restful API Codeigniter 4

## Instalasi

Ubah pengaturan database dan hilangkan `#` pada file `.env`
```
# database.default.hostname = localhost
# database.default.database = ci4
# database.default.username = root
# database.default.password = root
# database.default.DBDriver = MySQLi
```
contoh menjadi :
```
database.default.hostname = localhost
database.default.database = hyung_db
database.default.username = akbar
database.default.password = bengek123!
database.default.DBDriver = MySQLi
```

Buat database baru
`php spark db:create <nama databasenya>`

Migrasikan table yang sudah dibuat
`php spark migrate`