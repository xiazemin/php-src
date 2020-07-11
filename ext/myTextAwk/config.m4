dnl $Id$
dnl config.m4 for extension myTextAwk

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

dnl If your extension references something external, use with:

 PHP_ARG_WITH(myTextAwk, for myTextAwk support,
 Make sure that the comment is aligned:
 [  --with-myTextAwk             Include myTextAwk support])

dnl Otherwise use enable:

dnl PHP_ARG_ENABLE(myTextAwk, whether to enable myTextAwk support,
dnl Make sure that the comment is aligned:
dnl [  --enable-myTextAwk           Enable myTextAwk support])

if test "$PHP_MYTEXTAWK" != "no"; then
  dnl Write more examples of tests here...

  dnl # --with-myTextAwk -> check with-path
  dnl SEARCH_PATH="/usr/local /usr"     # you might want to change this
  dnl SEARCH_FOR="/include/myTextAwk.h"  # you most likely want to change this
  dnl if test -r $PHP_MYTEXTAWK/$SEARCH_FOR; then # path given as parameter
  dnl   MYTEXTAWK_DIR=$PHP_MYTEXTAWK
  dnl else # search default path list
  dnl   AC_MSG_CHECKING([for myTextAwk files in default path])
  dnl   for i in $SEARCH_PATH ; do
  dnl     if test -r $i/$SEARCH_FOR; then
  dnl       MYTEXTAWK_DIR=$i
  dnl       AC_MSG_RESULT(found in $i)
  dnl     fi
  dnl   done
  dnl fi
  dnl
  dnl if test -z "$MYTEXTAWK_DIR"; then
  dnl   AC_MSG_RESULT([not found])
  dnl   AC_MSG_ERROR([Please reinstall the myTextAwk distribution])
  dnl fi

  dnl # --with-myTextAwk -> add include path
  dnl PHP_ADD_INCLUDE($MYTEXTAWK_DIR/include)

  dnl # --with-myTextAwk -> check for lib and symbol presence
  dnl LIBNAME=myTextAwk # you may want to change this
  dnl LIBSYMBOL=myTextAwk # you most likely want to change this 

  dnl PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  dnl [
  dnl   PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $MYTEXTAWK_DIR/$PHP_LIBDIR, MYTEXTAWK_SHARED_LIBADD)
  dnl   AC_DEFINE(HAVE_MYTEXTAWKLIB,1,[ ])
  dnl ],[
  dnl   AC_MSG_ERROR([wrong myTextAwk lib version or lib not found])
  dnl ],[
  dnl   -L$MYTEXTAWK_DIR/$PHP_LIBDIR -lm
  dnl ])
  dnl
  dnl PHP_SUBST(MYTEXTAWK_SHARED_LIBADD)

  PHP_NEW_EXTENSION(myTextAwk, myTextAwk.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
fi
