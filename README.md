# Po.et Frost API PHP SDK

You think blockchain is cool? Check √

You're a techie publisher who wants to stamp and protect their work? Check √
 
You think Po.et is the most awesome platform to do this on? Check √

You ignore the haters, and pursue your love for sweet fresh PHP 7? Check √

Well alright then, sounds like you're in the right place!

## Background

You already passed the check test, so all you need are the [official docs](https://docs.frost.po.et/docs/getting-started).

## Installing

```php
composer require pete001/frost-php-sdk
```

## Configuration

Dont check in dat private key yo, use the dot env!

Sign up and fetch your API key from [here](https://frost.po.et/).

Add it to the `.env` in the project root.

## Usage

Because i like xmas, i made a simple factory to save time: 

```php
$api = (new FrostFactory)->api();
```

So far there are 3 juicy methods:

### Create Work

```php
$work = $api->createWork([
    'name' => 'I am a pickle',
    'datePublished' => '2018-02-15T20:12:01+00:00',
    'dateCreated' => '2018-02-14T19:50:21+00:00',
    'author' => 'Pickle Rick',
    'tags' => 'pickle rick morty unimpressed',
    'content' => 'Rick tells Morty to come to the garage, and Morty discovers that Rick has turned himself into a pickle but is unimpressed.'
]);

print_r($work);

Array
(
    [workId] => 46b6144b7fc6825caa3cf4b83149226f8d3f7bc0b20e6780c5d80423d1a5b86a
)
```

### Get Work

```php
$work = $api->getWorkById('46b6144b7fc6825caa3cf4b83149226f8d3f7bc0b20e6780c5d80423d1a5b86a');

print_r($work);

Array
(
    [name] => I am a pickle
    [datePublished] => 2018-02-15T20:12:01+00:00
    [dateCreated] => 2018-02-14T19:50:21+00:00
    [author] => Pickle Rick
    [tags] => pickle rick morty unimpressed
    [content] => Rick tells Morty to come to the garage, and Morty discovers that Rick has turned himself into a pickle but is unimpressed.
)
```

### Get All Works

```php
$work = $api->getWorks();

print_r($work);

Array
(
    [0] => Array
        (
            [name] => I am a pickle
            [datePublished] => 2018-02-15T20:12:01+00:00
            [dateCreated] => 2018-02-14T19:50:21+00:00
            [author] => Pickle Rick
            [tags] => pickle rick morty unimpressed
            [content] => Rick tells Morty to come to the garage, and Morty discovers that Rick has turned himself into a pickle but is unimpressed.
        )

    [1] => Array
        (
            [name] => I am still a pickle
            [datePublished] => 2018-02-15T21:12:01+00:00
            [dateCreated] => 2018-02-14T20:50:21+00:00
            [author] => Pickle Rick
            [tags] => pickle rick morty unimpressed repetitive
            [content] => Rick tells Morty once again, to come to the garage, and Morty discovers that Rick is still a pickle. He remains unimpressed.
        )

)
```

## Tests

Project has 100% test coverage, but due to my hipster nature, the CI is run over at Gitlab. So you'll 
just have to take my word for it. 

To run the test suites, simply execute:

```php
vendor/bin/phpunit
```

If you wanna get fancy and check code coverage:

```php
vendor/bin/phpunit --coverage-html tests/coverage
```

If you're as OCD as i am, you might wanna run some static analysis:

```php
vendor/bin/phpmetrics --report-html="tests/static" .
```

## License

As tempting as it is to troll the world by centralising the distribution of an app for the 
decentralised world... This is free, free for all! 

MIT License
