# ratcatcher
A utility to track and categorize statistics related to Rapid Access Testing for COVID-19

## This repository was conceived for the Recess Hacks 3.0 hackathon

## Inspiration

ratcatcher was an idea I had way back in the beginning of the pandemic. I was surprised at how little governments seemed to care about rapid testing- by not counting rapid tests in official COVID tallies, the numbers could be artificially deflated. That is what inspired me to pursue this idea during Recess Hacks 3.0.

## What does it do?

ratcatcher is an easy-to-deploy utility designed to take a variety of user input from a validated RAT test kit (via QR code or NFC) and then upload it to a database where researchers and government officials can view a map and searchable table displaying symptoms and case statistics.

ratcatcher is easily configurable and as such is not constrained to just working as a COVID-19 tracking system. The authentication can be switched off to allow self-reporting and outbreak tracking of any illness, and to support traditional RAT kits that do not have NFC or QR code-based identification and authentication.

## How I built it

ratcatcher is remarkably simple if you tear it down. It all starts with the hardware. What really makes this concept work is the fact that it integrates with the tests. By embedding an NFC tag in the box, you can easily access the ratcatcher site, preloaded with that test kit's data and settings.

After this, you are prompted to create a kind of profile. Passwords are annoying to deal with, and for something low-security like this, we can get away with just using email verification before permanent alterations to the data is made. This makes it pretty tricky for attackers to poison the data, and when combined with the rate limit, it makes it more trouble than it is worth to troll the site.

The final layer is the data layer. Constructed on a MariaDB MySQL database, there are built in PHP export tools that I painstakingly built from scratch... rules are rules! Through these tools, the database is publicly accessible, with the notable exception of personal information. This means that trends can be analyzed by anyone, and the data visualized in any way, but no personal information is released.

It is all running on an Apache web server with PHP 7.4... so very simple construction indeed! 

## Challenges I ran into

PHP is a really fun and simple language once you learn it. I've been using it for about 4 years now. Even so, I still forgot some semicolons while building ratcatcher. As well, there is a SQL statement that used the variable "$result" as a stand-in for the test result (positive or negative). As a result, I spent an hour and a half debugging because there was another variable called request, used by one of my SQL handling functions! I love PHP, but sometimes it is pretty frustrating.

As well, the time crunch was difficult. Had to adhere to a really tight schedule to make everything work on time.

## Accomplishments

This is the biggest PHP web app I have successfully developed independently. Typically I rely heavily on existing projects, but in this case I had to do it from scratch, with just the PHP manual and my own brain. I think that is my biggest accomplishment here- moving away from borrowing off of GitHub, and starting to contribute beneficial and well-thought-out programs of my own.

## What I've learned

I learned a lot while building this site. Mostly, that SQL is a lot of fun and data management is remarkably easy. I usually use flat file database methods, so this is a bit of a leap especially since it isn't based on anything. I have learned that PHP and MariaDB running off of my development server is pretty slow, so to expand this project any more I would have to deploy on better hardware.

## What's next

Well, not a lot of rat catching on my side. I'm switching gears once again to refocus on my spacecraft project, a 2U space tug called Nightingale. Launching in 2026, she's quite the drain on my finances, hence my involvement in competitions and freelance work that I wouldn't typically do. You can follow my account @openspacesys on Twitter if you'd like to follow along with the major updates, or @brodie_friesen if you want to catch some fun quips and stuff. 

The next steps for ratcatcher would be a nice UI, and more datapoints through a survey (ie vaccine doses, location, family, etc). Thanks a lot for having a look at ratcatcher!

## Tools and Libraries used

- PHP, Apache2, MariaDB/MySQL/PHPmyadmin
- php.net for syntax
- w3schools for help understanding SQL
- LeafletJS for mapping

