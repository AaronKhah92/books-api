

## How to setup this API

1. Edit the pivot tables to be singular database (bookshelf.sqlite) like this: author_book,
   this because laravel requires this for pivot tables.
2. Open the directory in terminal and type: composer install
3. In the terminal, type: php artisan serve
4. Voila...

## This api has the following endpoints

- api/authors                             
- api/authors/{author_id}/books           
- api/authors/{author_id}/books/{book_id} 
- api/authors/{id}                        
- api/books                               
- api/books/{book_id}/authors             
- api/books/{book_id}/authors/{author_id} 
- api/books/{book_id}/genres              
- api/books/{id}                          
- api/genres                              
- api/genres/{id}                         

