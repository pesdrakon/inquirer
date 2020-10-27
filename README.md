
# Api info

##installation

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Edit API_TOKEN in .env file 
- Run __composer install__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)


##testing

- Run __php artisan test__ (its clear database)

##routes descriptions

- GET:__/api/inquirer/get/{key}__ - get inquirer answers list directly by key (non secured method)
- POST:__/api/questions/store__ - store questions (non secured method). Example JSON: 
```json
{
    "questions": [
        {
          "answer_id": "1",
          "question" : "test_1"
        },
        {
          "answer_id": "11",
          "question" : "test_11"
        }
    ]                                                                   
}
```
- GET:__/api/inquirer__ - get inquirers list with answers and questions (secured by bearer token, you can get token in .env file)
- POST:__/api/inquirer__ - store inquirer with answers (secured by bearer token). Example JSON: 
```json
{
    "title": "inquirer title",
    "key": "unquirer_unique_key",
    "answers": [
        "Who is ...?",
        "Answer 2"
    ]
    
}
```
- GET:__/api/diagram_data__ - return statistic diagrams data (secured by bearer token)


