# Larvel-Elasticsearch-React

This is a simple app demonstrating React in Laravel and using Elasticsearch for a datasource. 

**setup:**

After cloning the project ...

`cd laravel-elasticsearch-react`

`vagrant up`

`vagrant ssh app`


*in the vagrant box...*

`cd /src`

`composer install`

`npm install`


Elasticsearch is not supplied in the virtual. You will need a running copy of Elasticsearch with an index or alias called 'articles' and one called 'channels'. 

**TODO:**
* Add React tests
* Add caching with Redis
* Include ES and sample data

