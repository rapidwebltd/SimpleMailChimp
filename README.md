# 🐵 SimpleMailChimp

SimpleMailChimp is a simplified wrapper for common MailChimp functionality.

<img src="assets/images/simple-mailchimp-usage.png" alt="Simple MailChimp usage" />

## Installation

To install this package, just use composer.

```
composer require rapidwebltd/simplemailchimp
```

If your framework does not already do so, you must add `require_once "vendor/autoload.php"` to any files in which you wish to use SimpleMailChimp.

## Getting Started

In order to create a `SimpleMailChimp` object, call the `getByAPIKey` function from the `SimpleMailChimpFactory` and pass it your API key.
```php
$simpleMailChimp = SimpleMailChimpFactory::getByAPIKey('API_KEY_GOES_HERE');
```

### Subscribing a user to a list

To subscribe a user to a list call the `subscribe` function and pass through the MailChimp list id and the user's email.
```php
$simpleMailChimp->subscribe('LIST_ID_GOES_HERE', 'example@example.com');
```

If successful it will return an array containing the subscriber's data.

### Unsubscribing a user from a list

To unsubscribe a user from a list call the `unsubscribe` function and pass through the MailChimp list id and the user's email.

```php
$simpleMailChimp->unsubscribe('LIST_ID_GOES_HERE', 'example@example.com');
```

If successful it will return an array containing the subscriber's data.

### Getting a subscriber's details

To get the details of a specific subscriber from a list call the `getSubscriberDetails` function and pass through the MailChimp list id and the user's email.

```php
$simpleMailChimp->getSubscriberDetails('LIST_ID_GOES_HERE', 'example@example.com');
```

If successful it will return an array containing the subscriber's data.

### Checking to see if a subscriber is already on a list and subscribed

To see if a subscriber is already on a list and is subscribed call the `isSubscribedToList` function and pass through the MailChimp list id and the user's email.

```php
$simpleMailChimp->isSubscribedToList('LIST_ID_GOES_HERE', 'example@example.com');
```

This function will return TRUE if the subscriber is found on the list AND is subscribed to it and return FALSE if either the user is not found on the list OR is in the list but set to unsubscribed.

### Getting all the members of a list

To get all the members of a list call the `getAllUsersInList` function and pass through the MailChimp list id and a comma separated list of the specific fields you want to return. If no parameters are set it retrieves the member's email by default.

```php
$simpleMailChimp->getAllUsersInList('LIST_ID_GOES_HERE');
```
Will return an array of emails belonging to members of the list specified.

```php
$simpleMailChimp->getAllUsersInList('LIST_ID_GOES_HERE','email_address,status');
```
Will return an array of emails and the relevant statuses belonging to members of the list specified.
Available parameters can be found on the MailChimp API documentation page (under 'Response body parameters' -> 'members' -> 'Show properties'):
http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/#read-get_lists_list_id_members. 

Note that this function returns all members of a list regardless of whether they are subscribed or not.

