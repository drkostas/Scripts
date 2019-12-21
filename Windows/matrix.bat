@echo off
 color 02
 :start
 SET /A test1 = %RANDOM% * 9 / 32768 + 1
 SET /A test2 = %RANDOM% * 9 / 32768 + 1
 SET /A test3 = %RANDOM% * 9 / 32768 + 1
 SET /A test4 = %RANDOM% * 9 / 32768 + 1
 SET /A test5 = %RANDOM% * 9 / 32768 + 1
 SET /A test6 = %RANDOM% * 9 / 32768 + 1
 SET /A test7 = %RANDOM% * 9 / 32768 + 1
 SET /A test8 = %RANDOM% * 9 / 32768 + 1
 SET /A test9 = %RANDOM% * 9 / 32768 + 1
 SET /A test10 = %RANDOM% * 9 / 32768 + 1
 echo %test1%   %test2%   %test3%       %test5%   %test6%   %test7%       %test9%       %test1%           %test4%   %test5%   %test6%       %test8%   %test9%   %test1%       %test3%       %test5%       %test7%       %test9%       %test1%           %test4%   %test5%   %test6%       %test8%   %test9%   %test1%   %test2%   %test3%       %test5%   %test6%   %test7%       %test9%       %test1%           %test4%       %test6%       %test8%   %test9%    
 ping localhost -n 1 -w 100>nul 
 echo %test1%           %test4%   %test5%   %test6%       %test8%   %test9%   %test10%       %test2%   %test3%       %test5%   %test6%           %test9%       %test1%           %test4%       %test6%       %test8%               %test2%           %test5%       %test7%       %test9%   %test10%   %test1%           %test4%   %test5%   %test6%           %test9%   %test10%           %test3%           %test6%           %test9%   %test10%
 ping localhost -n 1 -w 100>nul 
 echo     %test2%       %test4%           %test7%       %test9%   %test10%   %test1%       %test3%   %test4%   %test5%       %test7%   %test8%   %test9%       %test2%       %test4%                   %test9%       %test1%           %test4%           %test7%       %test9%       %test2%       %test4%           %test7%       %test9%       %test1%       %test3%   %test4%       %test6%       %test8%   %test9% 
 ping localhost -n 1 -w 100>nul  
 echo %test1%   %test2%   %test3%   %test4%   %test5%   %test6%   %test7%   %test8%   %test9%       %test1%       %test3%   %test4%           %test7%   %test8%       %test10%   %test1%       %test3%       %test5%       %test7%       %test9%       %test1%       %test3%   %test4%           %test7%   %test8%           %test1%           %test4%       %test6%   %test7%   %test8%                   %test3%   %test4%               %test8%       %test10%
 ping localhost -n 1 -w 100>nul 
 echo         %test3%   %test4%           %test7%   %test8%       %test10%       %test2%   %test3%       %test5%   %test6%   %test7%       %test9%   %test10%           %test3%   %test4%           %test7%           %test10%       %test2%   %test3%           %test6%   %test7%       %test9%               %test3%   %test4%           %test7%   %test8%       %test10%           %test3%       %test5%               %test9%   %test10%
 ping localhost -n 1 -w 100>nul 
goto start