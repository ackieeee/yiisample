mysql -u yii -pyii admin < /docker-entrypoint-initdb.d/sql/categories.sql
mysql -u yii -pyii admin < /docker-entrypoint-initdb.d/sql/users.sql
mysql -u yii -pyii admin < /docker-entrypoint-initdb.d/sql/articles.sql
mysql -u yii -pyii admin < /docker-entrypoint-initdb.d/sql/add_articles_foreignkey.sql