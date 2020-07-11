dnl $Id$
dnl config.m4 for extension callBack

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

dnl If your extension references something external, use with:

 PHP_ARG_WITH(callBack, for callBack support,
 Make sure that the comment is aligned:
 [  --with-callBack             Include callBack support])

dnl Otherwise use enable:

dnl PHP_ARG_ENABLE(callBack, whether to enable callBack support,
dnl Make sure that the comment is aligned:
dnl [  --enable-callBack           Enable callBack support])

if test "$PHP_CALLBACK" != "no"; then
  dnl Write more examples of tests here...

  dnl # --with-callBack -> check with-path
  dnl SEARCH_PATH="/usr/local /usr"     # you might want to change this
  dnl SEARCH_FOR="/include/callBack.h"  # you most likely want to change this
  dnl if test -r $PHP_CALLBACK/$SEARCH_FOR; then # path given as parameter
  dnl   CALLBACK_DIR=$PHP_CALLBACK
  dnl else # search default path list
  dnl   AC_MSG_CHECKING([for callBack files in default path])
  dnl   for i in $SEARCH_PATH ; do
  dnl     if test -r $i/$SEARCH_FOR; then
  dnl       CALLBACK_DIR=$i
  dnl       AC_MSG_RESULT(found in $i)
  dnl     fi
  dnl   done
  dnl fi
  dnl
  dnl if test -z "$CALLBACK_DIR"; then
  dnl   AC_MSG_RESULT([not found])
  dnl   AC_MSG_ERROR([Please reinstall the callBack distribution])
  dnl fi

  dnl # --with-callBack -> add include path
  dnl PHP_ADD_INCLUDE($CALLBACK_DIR/include)

  dnl # --with-callBack -> check for lib and symbol presence
  dnl LIBNAME=callBack # you may want to change this
  dnl LIBSYMBOL=callBack # you most likely want to change this 

  dnl PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  dnl [
  dnl   PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $CALLBACK_DIR/$PHP_LIBDIR, CALLBACK_SHARED_LIBADD)
  dnl   AC_DEFINE(HAVE_CALLBACKLIB,1,[ ])
  dnl ],[
  dnl   AC_MSG_ERROR([wrong callBack lib version or lib not found])
  dnl ],[
  dnl   -L$CALLBACK_DIR/$PHP_LIBDIR -lm
  dnl ])
  dnl
  dnl PHP_SUBST(CALLBACK_SHARED_LIBADD)

  PHP_NEW_EXTENSION(callBack, callBack.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
fi
