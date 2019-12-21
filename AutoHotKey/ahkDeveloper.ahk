#NoEnv  
; Recommended for performance and compatibility with future AutoHotkey releases.
#Warn  
; Enable warnings to assist with detecting common errors.
SendMode Input  
; Recommended for new scripts due to its superior speed and reliability.
SetWorkingDir %A_ScriptDir%  
; Ensures a consistent starting directory.
;-------------------
;#->windows
;!->Alt
;^->Ctr
;+->Shift
;&->combine keys
;-------------------

;get win title
^F11::
WinGetTitle, Title, A
MsgBox, The active window is "%Title%".
return

;Reload Auto Hot Key -> press control+s to reload
#ifwinactive, AutoHotkey.ahk - Notepad
^s:: 
	send, {ctrl down}s{ctrl up}
	sleep 100
	reload
return