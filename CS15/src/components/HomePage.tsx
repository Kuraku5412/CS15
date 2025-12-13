import { Button } from "./ui/button";
import { Trophy, Users, Calendar, Award, Target, Flame } from "lucide-react";
import umLogo from "figma:asset/b3b68e19c39c9c734085aeecfd81ac684dcd3ebf.png";

interface HomePageProps {
  onGetStarted: () => void;
}

export function HomePage({ onGetStarted }: HomePageProps) {
  return (
    <div className="w-full min-h-screen flex flex-col">
      {/* Hero Section */}
      <div className="flex-1 flex flex-col items-center justify-center px-4 py-16">
        <div className="max-w-4xl w-full text-center space-y-8">
          {/* Logo */}
          <div className="flex justify-center">
            <img 
              src={umLogo}
              alt="University of Mindanao"
              className="w-48 h-48 object-contain"
            />
          </div>
          
          {/* Main Heading */}
          <div className="space-y-4">
            <div className="flex items-center justify-center gap-3">
              <Trophy className="size-12 text-amber-500" />
              <h1 className="text-red-900">UM Intramurals</h1>
            </div>
            <p className="text-xl text-red-800">
              Join the Ultimate University Experience
            </p>
            <p className="text-red-700 max-w-2xl mx-auto">
              Connect with fellow UMians, compete in exciting events, and bring glory to your department. 
              Your journey to campus sports excellence starts here!
            </p>
          </div>
          
          {/* CTA Buttons */}
          <div className="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
            <Button 
              onClick={onGetStarted}
              className="bg-red-800 hover:bg-red-900 px-8 py-6 text-lg"
            >
              Get Started
            </Button>
            <Button 
              onClick={onGetStarted}
              variant="outline"
              className="border-red-800 text-red-800 hover:bg-red-50 px-8 py-6 text-lg"
            >
              Sign In
            </Button>
          </div>
        </div>
      </div>
      
      {/* Features Section */}
      <div className="bg-white/60 backdrop-blur-sm py-16 px-4">
        <div className="max-w-6xl mx-auto">
          <h2 className="text-center text-red-900 mb-12">Why Join UM Intramurals?</h2>
          
          <div className="grid md:grid-cols-3 gap-8">
            <div className="text-center space-y-4">
              <div className="flex justify-center">
                <div className="bg-red-800 p-4 rounded-full">
                  <Users className="size-8 text-amber-300" />
                </div>
              </div>
              <h3 className="text-red-900">Cheer for your Department</h3>
              <p className="text-red-700">
                Connect with your friends & classmates to cheer and enjoy the event
              </p>
            </div>
            
            <div className="text-center space-y-4">
              <div className="flex justify-center">
                <div className="bg-red-800 p-4 rounded-full">
                  <Calendar className="size-8 text-amber-300" />
                </div>
              </div>
              <h3 className="text-red-900">Compete & Schedule</h3>
              <p className="text-red-700">
                Easy attendance, real-time scores, and comprehensive tournament brackets
              </p>
            </div>
            
            <div className="text-center space-y-4">
              <div className="flex justify-center">
                <div className="bg-red-800 p-4 rounded-full">
                  <Trophy className="size-8 text-amber-300" />
                </div>
              </div>
              <h3 className="text-red-900">Win Glory</h3>
              <p className="text-red-700">
                Compete for championships and earn bragging rights across campus
              </p>
            </div>
          </div>
        </div>
      </div>
      
      {/* Stats Section */}
      <div className="py-12 px-4">
        <div className="max-w-4xl mx-auto grid grid-cols-3 gap-8 text-center">
          <div>
            <div className="flex justify-center mb-2">
              <Target className="size-8 text-red-800" />
            </div>
            <div className="text-3xl text-red-900">15+</div>
            <div className="text-sm text-red-700">Events</div>
          </div>
          <div>
            <div className="flex justify-center mb-2">
              <Flame className="size-8 text-red-800" />
            </div>
            <div className="text-3xl text-red-900">200+</div>
            <div className="text-sm text-red-700">Active Players</div>
          </div>
          <div>
            <div className="flex justify-center mb-2">
              <Award className="size-8 text-red-800" />
            </div>
            <div className="text-3xl text-red-900">10+</div>
            <div className="text-sm text-red-700">Departments</div>
          </div>
        </div>
      </div>
    </div>
  );
}
