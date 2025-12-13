import { useState } from "react";
import { AuthForm } from "./components/AuthForm";
import { HomePage } from "./components/HomePage";
import { Toaster } from "sonner@2.0.3";

export default function App() {
  const [showAuth, setShowAuth] = useState(false);

  if (showAuth) {
    return (
      <div className="size-full flex items-center justify-center bg-gradient-to-br from-red-50 via-amber-50 to-yellow-50 relative">
        <AuthForm onBack={() => setShowAuth(false)} />
        <Toaster position="top-center" richColors expand={true} duration={4000} />
      </div>
    );
  }

  return (
    <div className="size-full bg-gradient-to-br from-red-50 via-amber-50 to-yellow-50">
      <HomePage onGetStarted={() => setShowAuth(true)} />
      <Toaster position="top-center" richColors expand={true} duration={4000} />
    </div>
  );
}