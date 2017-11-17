#NoEnv  ; Recommended for performance and compatibility with future AutoHotkey releases.
; #Warn  ; Enable warnings to assist with detecting common errors.
SendMode Input  ; Recommended for new scripts due to its superior speed and reliability.
SetWorkingDir %A_ScriptDir%  ; Ensures a consistent starting directory.
;-------------------
;#->windows
;!->Alt
;^->Ctr
;+->Shift
;&->combine keys
;-------------------

;restart sharemouse
^F12::
	Process, Exist, ShareMouse.exe
	If ErrorLevel <> 0
	 Process, Close, ShareMouse.exe
	Else
	 Run, C:\Program Files (x86)\ShareMouse\ShareMouse.exe
	return