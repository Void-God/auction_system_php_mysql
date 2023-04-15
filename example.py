l = len(nums2)
m = len(nums1)
x = 0 ; y = 0
while y != l :
    if x > m + y - 1: 
        nums1 += nums2[y:]
        break
    if(nums1[x] > nums2[y]) : 
        nums1.insert(x,nums2[y])
        y += 1
    x += 1