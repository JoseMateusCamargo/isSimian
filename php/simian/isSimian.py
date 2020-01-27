
#!/usr/bin/env python3 

# complex O(R*C*N) R = linha, C = Coluna, N = tamanho da string(AAAA)
# algorithm using grid model

import sys

class GFG:

    def __init__(self): 
        self.R = None
        self.C = None
        self.dir = [[-1, 0], [1, 0], [1, 1],[1, -1], [-1, -1], [0, 1], [0, -1]]   
    
    def test(self, dna, row, col, word): 		

		if dna[row][col] != word[0]: 
			return False
			
		for x, y in self.dir: 
			
			rd, cd = row + x, col + y 
			flag = True
			
			for k in range(1, len(word)): 
				
				if (0 <= rd <self.R and	0 <= cd < self.C and word[k] == dna[rd][cd]):
					rd += x 
					cd += y 
				else: 
					flag = False
					break
 
			if flag: 
				return True
		return False    
    
    def isSimian(self, dna):
        
        self.R = len(dna)
        self.C = len(dna[0])
        
        flag = 0
        
        for row in range(self.R):
            for col in range(self.C):
                if self.test(dna, row, col, 'AAAA'):
                    flag = 1
                    break
                if self.test(dna, row, col, 'CCCC'):
                    flag = 1
                    break
                if self.test(dna, row, col, 'TTTT'):
                    flag = 1
                    break
                if self.test(dna, row, col, 'GGGG'):
                    flag = 1
                    break
        print(flag)

# Driver Code 
if __name__=='__main__': 
    
	dna = ' '.join(sys.argv[1:])
	
	dna = dna.split()

	gfg = GFG()
	
	valid = True

	for i in range(len(dna)):
	    
		for j in range(len(dna[i])):
			if dna[i][j] not in ['A','C', 'T', 'G', ' ']:
				valid = False
				print('DNA invalido')
				break
	
	if valid:
		gfg.isSimian(dna)
