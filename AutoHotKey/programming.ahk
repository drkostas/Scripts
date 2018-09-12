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

;alt+tab+up+enter (save file. alt+tab and run last command on cmd)
^Space::
Sleep 200
Send ^{s}
Sleep 200
Send {Alt Down}{Tab}
Sleep 100
Send {Alt Up}
Sleep 200
Send {Up}
Sleep 200
Send {Enter}
return

;Write colored console.log command(JavaScript)
+w::
Send, console.log('`%c ', 'background: dodgerblue; color: yellow');
return

;Write Error Display Command(PHP)
+q::
Send, error_reporting(E_ALL);ini_set('display_errors', 1);
return

;Write dummy email(for forms)
+m::
	Send, delfinas7kostas@gmail.co.uk
	return

;Write dummy password(for forms)
+p::
	Send, j8PS=0iqlrT!
	return

;Write dummy telephone(for forms)
+t::
	Send, 07512345678
	return

;Open CMD starts here
SetTitleMatchMode RegEx
    return

#IfWinActive ahk_class ExploreWClass|CabinetWClass

    ; create new text file
    ;
    #t::Send !fwt

    ; open 'cmd' in the current directory
    ;
    #c::
        OpenCmdInCurrent()
    return
#IfWinActive


; Opens the command shell 'cmd' in the directory browsed in Explorer.
; Note: expecting to be run when the active window is Explorer.
;

OpenCmdInCurrent()
{
    ; This is required to get the full path of the file from the address bar
    WinGetText, full_path, A

    ; Split on newline (`n)
    StringSplit, word_array, full_path, `n

    ; Find and take the element from the array that contains address
    Loop, %word_array0%
    {
        IfInString, word_array%A_Index%, Address
        {
            full_path := word_array%A_Index%
            break
        }
    }  

    ; strip to bare address
    full_path := RegExReplace(full_path, "^Address: ", "")

    ; Just in case - remove all carriage returns (`r)
    StringReplace, full_path, full_path, `r, , all


    IfInString full_path, \
    {
        Run,  cmd /K cd /D "%full_path%"
    }
    else
    {
        Run, cmd /K cd /D "C:\ "
    }
}
#c::OpenCmdInCurrent()