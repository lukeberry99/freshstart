# Freshstart
Boilerplate app for Laravel single page apps

Using Vue/Vuex and Laravel 5.5 this boilerplate comes with the following:

- Registration
- Login
- Logout
- Routing

## Installation
1. Clone the repository
2. `$ composer install`
3. `$ yarn` or `$ npm install`
4. `$ cp .env.example .env`
5. Add database details to `.env`
6. `$ php artisan key:generate`
7. `$ php artisan jwt:generate`
8. `yarn watch` or `npm run watch`
9. Visit in browser, enjoy

## Upcoming Features
The following are planned features, no ETA.

**Roles and permissions**
- Admin role

**Admin Panel**
- See registered users
- Edit users
- Invite users

**Event Broadcasting**
- User registration
- Invite accepted
- Display these to admins

