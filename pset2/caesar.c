#include <stdio.h>
#include <cs50.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
  
int main(int argc, string argv[])
{
    int key,code;
    if (argc ==1 )
       {
          printf("plz enter a statement\n");
          return 1;
       }
    string strp=GetString();
    key = atoi(argv[1]);
 
    if (key>=26)
       {
          key = (key%26);
       }
    
    for(int i=0, len=strlen(strp); i<len; i++)
    {
        code=(strp[i] + key);
        
        if (isupper(strp[i]) && (code>'Z'))
          {
            code-=26;
          }
        if (islower(strp[i]) && (code>'z'))
          {
            code-=26;
          }
        if (isalpha(strp[i]))
          {
            printf("%c", code);
          } 
        else
          {
            printf("%c", strp[i]);
          }
 
    }
    printf("\n");
    return 0;
}