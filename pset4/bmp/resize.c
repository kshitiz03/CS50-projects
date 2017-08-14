#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
		if (argc != 4)
		{
				printf("Usage:resize n infile outfile\n");
				return 1;
		}

		int factor = atoi(argv[1]);
		if(factor < 0 || factor > 100)
		{
				printf("The resize factor should be a positive integer >= 100.\n");
				return 2;
		}
 
		char* infile = argv[2];
		char* outfile = argv[3];

		FILE* inptr = fopen(infile, "r");
		if (inptr == NULL)
		{
				printf("Could not open %s.\n", infile);
				return 3;
		}

		FILE* outptr = fopen(outfile, "w");
		if (outptr == NULL)
		{
				fclose(inptr);
				fprintf(stderr, "Could not create %s.\n", outfile);
				return 4;
		}

		BITMAPFILEHEADER bf;
		fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);

		BITMAPINFOHEADER bi;
		fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);

		if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
						bi.biBitCount != 24 || bi.biCompression != 0)
		{
				fclose(outptr);
				fclose(inptr);
				fprintf(stderr, "Unsupported file format.\n");
				return 4;
		}

		BITMAPFILEHEADER out_bf;
		BITMAPINFOHEADER out_bi;	
		out_bf = bf;
		out_bi = bi;
		out_bi.biWidth = bi.biWidth * factor;
		out_bi.biHeight = bi.biHeight * factor;

		int in_padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
		int out_padding =  (4 - (out_bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;

		out_bf.bfSize = 54 + out_bi.biWidth * abs(out_bi.biHeight) * 3 + abs(out_bi.biHeight) *  out_padding;
		out_bi.biSizeImage = ((((out_bi.biWidth * out_bi.biBitCount) + 31) & ~31) / 8) * abs(out_bi.biHeight);

		fwrite(&out_bf, sizeof(BITMAPFILEHEADER), 1, outptr);

		fwrite(&out_bi, sizeof(BITMAPINFOHEADER), 1, outptr);

		for (int i = 0, biHeight = abs(bi.biHeight); i < biHeight; i++)
		{
				for(int n = 0; n < factor; n++)
				{
						for (int j = 0; j < bi.biWidth; j++)
						{
								RGBTRIPLE triple;

								fread(&triple, sizeof(RGBTRIPLE), 1, inptr);

								for(int m = 0; m < factor; m++) 
								{
										fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
								}
						}

						fseek(inptr, in_padding, SEEK_CUR);

						for (int k = 0; k <out_padding; k++)
								fputc(0x00, outptr);

						fseek(inptr, -(bi.biWidth * 3 + in_padding ), SEEK_CUR);

				}
				fseek(inptr, bi.biWidth*3+in_padding, SEEK_CUR);
		}

		fclose(inptr);
		fclose(outptr);

		return 0;
}