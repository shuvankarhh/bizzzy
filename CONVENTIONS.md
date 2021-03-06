## Design pattern

We are trying to maintain RESTful conventions as much as possible. Every actions are broken down to the six REST verbs. Those are:

> GET

> POST

> PUT

> PATCH

> DELETE

> OPTIONS

Create controller for an action and perform any of these 6 actions.

## Folder Structure

#### We will try to follow folder structure for **_Controller_** with this broad three categories.

> Freelancer

> Recruiter

> Admin

#### This is the folder structure for **_views_**

> *admin*
> - This folder holds all admin related views.

> *authentication*
> - This folder holds all the authentication related views.

> *components*
> - This folder holds laravel components that are used in other views.

> *contents*
> - This folder holds all major contents of the website.

> *get_stated*
> - This folder contains all the getting started questions.

> *layouts*
> - This folder contains all the layouts of the website like: app, navbar, footer that are extended.

> *profile*
> - This folder contains all the profile related contents.

> *staff*
> - This folder contains all the views for the panels for staff.

> *templates*
> - This folder contains different templates that are used like: email template.

## Permission

We have user Spatie **[Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction)** package for role and permission.

As role based permission system have <a href="https://owasp.org/www-project-proactive-controls/v3/en/c7-enforce-access-controls">**limitations**</a> we will strictly be using direct permission for all user.
