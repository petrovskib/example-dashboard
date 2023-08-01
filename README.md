1. copy .env.example to .env and add
   'WWWGROUP=1000
    WWWUSER=1000'
   to .env file
2. run command 'docker run --rm --interactive --tty -v $(pwd):/app composer install'
3. generate app key
4. run 'docker compose up'
5. run migrations
6. you have to register to be able to see /posts route
7. rest api route is '/api/posts' and 'api/show/{id}'

   
