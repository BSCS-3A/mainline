# Folder Structure to be followed by all groups:  
root  
&nbsp;&nbsp;&nbsp;&nbsp;index.php (login page)  
&nbsp;&nbsp;&nbsp;&nbsp;db  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sql files  
&nbsp;&nbsp;&nbsp;&nbsp;html  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;html files  
&nbsp;&nbsp;&nbsp;&nbsp;img  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;logo.jpg  
&nbsp;&nbsp;&nbsp;&nbsp;js  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;java.js  
&nbsp;&nbsp;&nbsp;&nbsp;php  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;connect.php 
&nbsp;&nbsp;&nbsp;&nbsp;css  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;style.css 

# File naming: component_Feature_vN_M.fileextension  
component: front, backFun, backSec <br>
N: version number (major changes)  <br>
M: version number (minor changes)  <br><br>

Feature: <br>
Admin Management    | Codename
--------------------|-------------
Admin Accounts      | adAccnt
Election Scheduler  | schedConfig
Signatory Configure | signConfig 
Admin Activity Logs | actLogs 

<br>

Dashboard          | Codename
-------------------|-----------
Student Dashboard  | studDash
Admin Dashboard    | adminDash 
Authentication     | Authentication
Access Logs        | accessLogs

<br>

Student Management | Codename
-------------------|-----------
Student Account    | studAcc
Summary of Votes   | vtSumm
Message Box        | Mbox

<br>

Candidate Management | Codename
-------------------|-----------
empty    | empty

<br>

Voting Process     | Codename
-------------------|-----------
DB Connection | connect
Voting page   | vtBallot
Ballot Generation | vtFetch
Vote Confirmation | vtConfrim
Vote Submission | vtSubmit
Update VOter Stat | vtStatUpdate
Receipt | vtReceipt
Security | vtValSan

<br>

Monitoring                 | Codename
---------------------------|---------------
Ongoing Election Status    | Elecstat  
No On-going Election Status| NoElecStat  
End of Election Status     | EndStat  
Election Results           | ElectRes  
Stud Archives Folders      | ArcFolder  
Stud ArchivesListofWinners | ArcList  
Election                   | Election  
Vote Status Percentage     | VsPercentage  
Vote Status Grade 7        | VstatG7  
Vote Status Grade 8        | VstatG8  
Vote Status Grade 9        | VstatG9  
Vote Status Grade 10       | VstatG10  
Vote Status Grade 11       | VstatG11  
Vote Status Grade 12       | VstatG12  
Admin Archives Folders     | ArchFolder  
Admin ArchivesListofWinners| ArchList  
Election Results Report    | Report  


-----------------------------------------------------------

# Links:  
Resource | Link
--------|-----------
project | https://drive.google.com/drive/u/1/folders/1cyo_5iGr4_6_7nx1SnbXZE1aHy8X6GDE  
installers | https://drive.google.com/drive/folders/1o0Wh7KJLx3E9oH4lJK4vzAeeIntqc5dr?usp=sharing  
host | https://ph.000webhost.com/  
domain name | https://my.freenom.com/  
php tutorial | https://www.w3schools.com/php/default.asp
html tutorial | https://www.w3schools.com/html/html_responsive.asp
jquery tutorial | https://www.w3schools.com/jquery/default.asp
javascript tutorial | https://www.w3schools.com/js/default.asp
-----------------------------------------------------------

# Front End CSS Guide 
<br>

Letter  | Feature
--------|-----------
A       | Dashboard and Authentication
B       | Monitoring
C       | Student Management
D       | Admin Management
E       | Candidate Information Management
F       | Voting Process
