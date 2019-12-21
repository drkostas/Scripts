#Test smtp port 25 for a particular website
telnet your.website.com 25
helo your.website.com
mail from:<user1@website.com>
rcpt to:<user2@website.com>
data
From: user1@website.com
Subject: Testing smtp vulnarability of the server
Your server is still vulnerable!
sent from drkostas
.
