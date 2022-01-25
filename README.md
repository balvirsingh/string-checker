# Feed.

## Checker


## Running the project.

To run the project after cloning follow the steps below:

I have setup this project with docker.

```
With Docker -
If do you want to install with docker then first please install the docker and docker compose on your system and follow the steps mentioned below. Here are the links -

https://docs.docker.com/engine/install/
https://docs.docker.com/compose/install/
```

```
Without Docker -
If do you want to install without docker then the following are the requirements -
Apache2
PHP 7.4

For non-docker project, commands are the same (skip first command)

Replace the ./docker-php with php
```

1. In 1st terminal tab: Run the container

```
docker-compose up
```

2. In 2nd terminal tab: Composer install

```
./docker-php composer install
```


3. Here are the examples of three methodes with parameters. param1 and param2 can be the string values need to pass

```
./docker-php bin/console app:checker isPalindrome param1
./docker-php bin/console app:checker isPangram param1
./docker-php bin/console app:checker isAnagram param1 param2
```
