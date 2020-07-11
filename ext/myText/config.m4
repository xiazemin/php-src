dnl $Id$
dnl config.m4 for extension myText

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

dnl If your extension references something external, use with:

 PHP_ARG_WITH(myText, for myText support,
 Make sure that the comment is aligned:
 [  --with-myText             Include myText support])

dnl Otherwise use enable:

dnl PHP_ARG_ENABLE(myText, whether to enable myText support,
dnl Make sure that the comment is aligned:
dnl [  --enable-myText           Enable myText support])

if test "$PHP_MYTEXT" != "no"; then
  dnl Write more examples of tests here...

  dnl # --with-myText -> check with-path
  dnl SEARCH_PATH="/usr/local /usr"     # you might want to change this
  dnl SEARCH_FOR="/include/myText.h"  # you most likely want to change this
  dnl if test -r $PHP_MYTEXT/$SEARCH_FOR; then # path given as parameter
  dnl   MYTEXT_DIR=$PHP_MYTEXT
  dnl else # search default path list
  dnl   AC_MSG_CHECKING([for myText files in default path])
  dnl   for i in $SEARCH_PATH ; do
  dnl     if test -r $i/$SEARCH_FOR; then
  dnl       MYTEXT_DIR=$i
  dnl       AC_MSG_RESULT(found in $i)
  dnl     fi
  dnl   done
  dnl fi
  dnl
  dnl if test -z "$MYTEXT_DIR"; then
  dnl   AC_MSG_RESULT([not found])
  dnl   AC_MSG_ERROR([Please reinstall the myText distribution])
  dnl fi

  dnl # --with-myText -> add include path
  dnl PHP_ADD_INCLUDE($MYTEXT_DIR/include)

  dnl # --with-myText -> check for lib and symbol presence
  dnl LIBNAME=myText # you may want to change this
  dnl LIBSYMBOL=myText # you most likely want to change this 

  dnl PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  dnl [
  dnl   PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $MYTEXT_DIR/$PHP_LIBDIR, MYTEXT_SHARED_LIBADD)
  dnl   AC_DEFINE(HAVE_MYTEXTLIB,1,[ ])
  dnl ],[
  dnl   AC_MSG_ERROR([wrong myText lib version or lib not found])
  dnl ],[
  dnl   -L$MYTEXT_DIR/$PHP_LIBDIR -lm
  dnl ])
  dnl
  dnl PHP_SUBST(MYTEXT_SHARED_LIBADD)

  PHP_NEW_EXTENSION(myText, myText.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
fi
