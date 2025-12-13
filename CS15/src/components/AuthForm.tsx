import { useState } from "react";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import { Label } from "./ui/label";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "./ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "./ui/tabs";
import { toast } from "sonner@2.0.3";
import { Trophy, Users, Calendar, ArrowLeft } from "lucide-react";
import umLogo from "figma:asset/b3b68e19c39c9c734085aeecfd81ac684dcd3ebf.png";

interface AuthFormProps {
  onBack?: () => void;
}

export function AuthForm({ onBack }: AuthFormProps) {
  const [loginEmail, setLoginEmail] = useState("");
  const [loginPassword, setLoginPassword] = useState("");
  const [registerName, setRegisterName] = useState("");
  const [registerEmail, setRegisterEmail] = useState("");
  const [registerPassword, setRegisterPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");

  const handleLogin = (e: React.FormEvent) => {
    e.preventDefault();
    
    if (!loginEmail || !loginPassword) {
      toast.error("Please fill in all fields");
      return;
    }
    
    // Simulate login
    toast.success("Signed In Successfully");
    setLoginEmail("");
    setLoginPassword("");
  };

  const handleRegister = (e: React.FormEvent) => {
    e.preventDefault();
    
    if (!registerName || !registerEmail || !registerPassword || !confirmPassword) {
      toast.error("Please fill in all fields");
      return;
    }
    
    if (registerPassword !== confirmPassword) {
      toast.error("Passwords do not match");
      return;
    }
    
    if (registerPassword.length < 6) {
      toast.error("Password must be at least 6 characters");
      return;
    }
    
    // Simulate registration
    toast.success("Registered Successfully");
    setRegisterName("");
    setRegisterEmail("");
    setRegisterPassword("");
    setConfirmPassword("");
  };

  return (
    <div className="w-full max-w-5xl flex gap-8 items-center px-4">
      {/* Back Button */}
      {onBack && (
        <button
          onClick={onBack}
          className="absolute top-6 left-6 flex items-center gap-2 text-red-800 hover:text-red-900 transition-colors"
        >
          <ArrowLeft className="size-5" />
          <span>Back to Home</span>
        </button>
      )}
      
      {/* Branding Section */}
      <div className="hidden lg:flex flex-col flex-1 space-y-6">
        <div className="space-y-4">
          <div className="flex items-center gap-3">
            <div className="bg-red-800 p-3 rounded-lg">
              <Trophy className="size-8 text-amber-300" />
            </div>
            <div>
              <h1 className="text-red-900">UM Intramurals</h1>
              <p> </p>
            </div>
          </div>
          
          <div className="flex justify-center py-6">
            <img 
              src={umLogo}
              alt="University of Mindanao"
              className="w-64 h-64 object-contain"
            />
          </div>
        </div>
        
        <div className="space-y-4">
          <div className="flex items-start gap-3 bg-white/60 backdrop-blur-sm p-4 rounded-lg">
            <Users className="size-6 text-red-800 mt-1 flex-shrink-0" />
            <div>
              <h3 className="text-red-900">Join Your Department</h3>
              <p className="text-sm text-red-700">Connect with your fellow students and compete in various events</p>
            </div>
          </div>
          
          <div className="flex items-start gap-3 bg-white/60 backdrop-blur-sm p-4 rounded-lg">
            <Calendar className="size-6 text-red-800 mt-1 flex-shrink-0" />
            <div>
              <h3 className="text-red-900">Schedule Matches</h3>
              <p className="text-sm text-red-700">View schedules, track scores, and manage your attendance</p>
            </div>
          </div>
          
          <div className="flex items-start gap-3 bg-white/60 backdrop-blur-sm p-4 rounded-lg">
            <Trophy className="size-6 text-red-800 mt-1 flex-shrink-0" />
            <div>
              <h3 className="text-red-900">Win Championships</h3>
              <p className="text-sm text-red-700">Compete for glory and earn bragging rights on campus</p>
            </div>
          </div>
        </div>
      </div>

      {/* Form Section */}
      <Card className="w-full max-w-md shadow-xl rounded-[20px]">
        <Tabs defaultValue="login" className="w-full">
          <TabsList className="grid w-full grid-cols-2">
            <TabsTrigger value="login">Login</TabsTrigger>
            <TabsTrigger value="register">Register</TabsTrigger>
          </TabsList>
          
          <TabsContent value="login">
            <form onSubmit={handleLogin}>
              <CardHeader className="space-y-3">
                <CardTitle className="text-3xl">Welcome Back, UMian!</CardTitle>
                <CardDescription className="mb-4">Sign in to access your intramurals account</CardDescription>
              </CardHeader>
              <CardContent className="space-y-6">
                <div className="space-y-3">
                  <Label htmlFor="login-email">University Email</Label>
                  <Input
                    id="login-email"
                    type="email"
                    placeholder="student@umindanao.edu.ph"
                    value={loginEmail}
                    onChange={(e) => setLoginEmail(e.target.value)}
                    required
                  />
                </div>
                <div className="space-y-3">
                  <Label htmlFor="login-password">Password</Label>
                  <Input
                    id="login-password"
                    type="password"
                    placeholder="••••••••"
                    value={loginPassword}
                    onChange={(e) => setLoginPassword(e.target.value)}
                    required
                  />
                </div>
              </CardContent>
              <CardFooter className="flex flex-col space-y-6">
                <Button type="submit" className="w-full bg-red-800 hover:bg-red-900 mt-4">
                  Sign In
                </Button>
                <button
                  type="button"
                  className="text-sm text-muted-foreground hover:text-red-800 transition-colors"
                >
                  Forgot password?
                </button>
              </CardFooter>
            </form>
          </TabsContent>
          
          <TabsContent value="register">
            <form onSubmit={handleRegister}>
              <CardHeader className="space-y-3">
                <CardTitle className="text-3xl">Join the Fun!</CardTitle>
                <CardDescription className="mb-4">Create your UM Intramurals account</CardDescription>
              </CardHeader>
              <CardContent className="space-y-6">
                <div className="space-y-3">
                  <Label htmlFor="register-name">Full Name</Label>
                  <Input
                    id="register-name"
                    type="text"
                    placeholder="John Doe"
                    value={registerName}
                    onChange={(e) => setRegisterName(e.target.value)}
                    required
                  />
                </div>
                <div className="space-y-3">
                  <Label htmlFor="register-email">University Email</Label>
                  <Input
                    id="register-email"
                    type="email"
                    placeholder="student@umindanao.edu.ph"
                    value={registerEmail}
                    onChange={(e) => setRegisterEmail(e.target.value)}
                    required
                  />
                </div>
                <div className="space-y-3">
                  <Label htmlFor="register-password">Password</Label>
                  <Input
                    id="register-password"
                    type="password"
                    placeholder="••••••••"
                    value={registerPassword}
                    onChange={(e) => setRegisterPassword(e.target.value)}
                    required
                  />
                </div>
                <div className="space-y-3">
                  <Label htmlFor="confirm-password">Confirm Password</Label>
                  <Input
                    id="confirm-password"
                    type="password"
                    placeholder="••••••••"
                    value={confirmPassword}
                    onChange={(e) => setConfirmPassword(e.target.value)}
                    required
                  />
                </div>
              </CardContent>
              <CardFooter>
                <Button type="submit" className="w-full bg-red-800 hover:bg-red-900 mt-4">
                  Create Account
                </Button>
              </CardFooter>
            </form>
          </TabsContent>
        </Tabs>
      </Card>
    </div>
  );
}