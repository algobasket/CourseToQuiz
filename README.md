# Course To Quiz (Web App - Not Ready For Production) 

This webapp is an online platform to learn about various courses and also give fun quiz about the course.

## Features & Functionalities

* Login (email and password)

* Only Admins can Add/update/delete questions to database

* Users, after login, will be presented with the quiz options to choose

** The options will include i) Number of Question ii) Domain (multiselect option)

* Based on the selection, users will be presented with questions one by one. Ex: If the user has chosen Number
 of Questions: 25 and Domain: Project Management, 25 random questions will be fetched from the database from the
 Project Management domain and the user will be presented the screen to take up the quiz test,

* "Next" button will pose the next question and "Previous" Button will traverse to the previous question.
 "Show Answer" button should reveal the answer to the user. "Explanation" button will display the explanation
 related to the question from the database. "Submit" button will submit the options and the answers are compared 
in the database and the result will be displayed to the user.

* Users quiz history will be saved in db and everytime the user logins, his history can be viewed by him in his dashboard

* Number of visitors to the website is to be tracked

* The website will have technical discussion panel, where users can ask questions and others can comment/reply

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
Apache 2.4
PHP 7.2
MYSQL 5.7
```

### Installing

A step by step series of process that tell you how to get a development env running

```
git clone https://github.com/algobasket/CourseToQuiz.git .
```

Go to application/config/database.php and do the changes below

```
	'username' => 'YOUR MYSQL USERNAME',
	'password' => 'YOUR MYSQL PASSWORD',
	'database' => 'YOUR MYSQL DATABASE NAME',
```
Then open your terminal and go to cloned folder
```
cd CourseToQuiz
php -S localhost:8001  (It will run your server)

```
you can access it in your browser http://localhost:8001

## Deployment To Production

```
SSH to your server - ssh user@<Your IP or domain> Then Password
```
Go to www/html/<To Your Domain Folder>

```
cd www/html/<To Your Domain Folder>
git clone https://github.com/algobasket/CourseToQuiz.git .
```


## Built With

* [Codeigniter-3](http://www.codeigniter.com/) - The web framework used
* [MYSQL](https://mysql.com/) - Database
* [Angular](https://angular/) - Used for frontend javascript framework

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/algobasket/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/algobasket/CourseToQuiz/tags). 

## Authors

* **Kripanidhi ** - *Initial work* - [CourseToQuiz](https://github.com/algobasket/CourseToQuiz/)

See also the list of [contributors](https://github.com/algobasket/CourseToQuiz/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Donate

* BTC : 36uSLDtaiBaRrQxgRdC3qdtevLhANBHfd6
* PAYPAL : https://paypal.me/algobasket
