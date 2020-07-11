dnl $Id$
dnl config.m4 for extension emtyExt

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

dnl If your extension references something external, use with:

 PHP_ARG_WITH(emtyExt, for emtyExt support,
 Make sure that the comment is aligned:
  [  --with-emtyExt             Include emtyExt support])

dnl Otherwise use enable:

dnl PHP_ARG_ENABLE(emtyExt, whether to enable emtyExt support,
dnl Make sure that the comment is aligned:
dnl [  --enable-emtyExt           Enable emtyExt support])

if test "$PHP_EMTYEXT" != "no"; then
  dnl Write more examples of tests here...

  dnl # --with-emtyExt -> check with-path
  dnl SEARCH_PATH="/usr/local /usr"     # you might want to change this
  dnl SEARCH_FOR="/include/emtyExt.h"  # you most likely want to change this
  dnl if test -r $PHP_EMTYEXT/$SEARCH_FOR; then # path given as parameter
  dnl   EMTYEXT_DIR=$PHP_EMTYEXT
  dnl else # search default path list
  dnl   AC_MSG_CHECKING([for emtyExt files in default path])
  dnl   for i in $SEARCH_PATH ; do
  dnl     if test -r $i/$SEARCH_FOR; then
  dnl       EMTYEXT_DIR=$i
  dnl       AC_MSG_RESULT(found in $i)
  dnl     fi
  dnl   done
  dnl fi
  dnl
  dnl if test -z "$EMTYEXT_DIR"; then
  dnl   AC_MSG_RESULT([not found])
  dnl   AC_MSG_ERROR([Please reinstall the emtyExt distribution])
  dnl fi

  dnl # --with-emtyExt -> add include path
  dnl PHP_ADD_INCLUDE($EMTYEXT_DIR/include)

  dnl # --with-emtyExt -> check for lib and symbol presence
  dnl LIBNAME=emtyExt # you may want to change this
  dnl LIBSYMBOL=emtyExt # you most likely want to change this 

  dnl PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  dnl [
  dnl   PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $EMTYEXT_DIR/$PHP_LIBDIR, EMTYEXT_SHARED_LIBADD)
  dnl   AC_DEFINE(HAVE_EMTYEXTLIB,1,[ ])
  dnl ],[
  dnl   AC_MSG_ERROR([wrong emtyExt lib version or lib not found])
  dnl ],[
  dnl   -L$EMTYEXT_DIR/$PHP_LIBDIR -lm
  dnl ])
  dnl
  dnl PHP_SUBST(EMTYEXT_SHARED_LIBADD)

  PHP_NEW_EXTENSION(emtyExt, emtyExt.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
fi
