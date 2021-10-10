#include <bits/stdc++.h>
#include <string.h>
 using namespace std;

int main() {
int n,count=0;

cin>>n;
vector<int>v(n);
int o,e,es;
//string to_string();
for(int i=0;i<n;i++){
    cin>>v[i];
    string s = to_string(v[i]);
    sort(s.begin(),s.end());
    int temp = (s[s.length()-1]-'0')*11 + (s[0] - '0')*7;
    v[i] = temp%100;
}

int <unordered_map<int,vector<int>>o,e;
for(int i=0;i<n;i=i+2){
    o[v[i]/10].push_back(i+1);
}
for(int i=1;i<n;i=i+2){
    e[v[i]/10].push_back(i+1);
}
count=0;
for(int i=0;i<10;i++){
    int os=o[i].size(),es=e[i].size();
    if(os==2)
        count++;
    if(es == 2)
        count++;
    if(os>2 || es>2)
        count += 2; 

}

cout<<count;
}
