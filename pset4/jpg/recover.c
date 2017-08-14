/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>
#include <string.h>


int main(void)
{
    FILE* fp = fopen("card.raw", "r");	

		if(fp == NULL)
		{	
				fclose(fp);
				fprintf(stderr, "cardfile file didn't open.\n");
				return 1;
		}

		uint8_t checkjpg1[4] = {0xff, 0xd8, 0xff, 0xe0};
		uint8_t checkjpg2[4] = {0xff, 0xd8, 0xff, 0xe1};

		
		int jpgcount = 0;

		// Open outfile indicator
		int open = 0;
		FILE* outp;

		uint8_t buffer[512];
		uint8_t check[4];
		fread(buffer, 512, 1, fp);	

		while(fread(buffer, 512, 1, fp) > 0)
		{
				for(int i = 0; i < 4; i++)
				{
						check[i] = buffer[i];
				}

				if((memcmp(checkjpg1, check, 4) == 0 ) || (memcmp(checkjpg2, check, sizeof(check)) == 0))
				{
						char filename[8];
						sprintf(filename, "%03d.jpg", jpgcount);

						if(open == 0)
						{
								outp = fopen(filename, "w");
								fwrite(buffer, sizeof(buffer), 1, outp);
								open = 1;
						}
						if(open == 1)
						{
								fclose(outp);
								outp = fopen(filename, "w");
								fwrite(buffer, sizeof(buffer), 1, outp);
								jpgcount++;
						}
				}
				else
				{
						if(open == 1)
						{
								fwrite(buffer, sizeof(buffer), 1, outp);
						}
				}
		}
    
    if(outp)
    {
      fclose(outp);
    }

		fclose(fp);
		return 0;
}
