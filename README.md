# Overview of the project scenario

A website that enables Colombo municipal council(CMC)l to provide an efficient garbage collection service. People can register to this website and post the pictures and the location (on a google map) of places with garbage where they have been observed along with a brief description about the situation so that the cleaning staff of the CMC can take care of the garbage. 

The posts created by the users of the website are reived and a priority level is given so that the highest priority once can be removed first.
***
# GarbageCollectingSystem

“Garbage Collection System” is the name of the web application we created. The base system has been developed PHP and HTML and has been enhanced with JavaScript and CSS. 
There are three user types with varying privileges.
Normal User
	A normal user creates posts and submit. A normal user has the ability to report others posts if they find out issues with the related posts. A normal user also has the ability to change his email, contact number, password and delete the account. 
Admin
	An admin is a user of the site with added privileges. An admin has a control panel where he can view the users, messages sent by users and guests and review the reported posts. An admin can delete any post or remove any user. An admin also appoints the Captain. There can be multiple admins.
Captain
A captain is a subset of admins, whom duty is to review every published post and set a priority level. A Captain can also delete the posts he thinks are unnecessary. There is only one captain.
