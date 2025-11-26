import { BrowserRouter as Router, Routes, Route } from "react-router";
import SignIn from "./pages/AuthPages/SignIn";
import SignUp from "./pages/AuthPages/SignUp";
import NotFound from "./pages/OtherPage/NotFound";
import AppLayout from "./layout/AppLayout";
import { ScrollToTop } from "./components/common/ScrollToTop";
import Home from "./pages/Dashboard/Home";
import Members from "./pages/Members/Members";
import ShareCapital from "./pages/ShareCapital/ShareCapital";
import Loans from "./pages/Loans/Loans";
import Reports from "./pages/Reports/Reports";
import PageMeta from "./components/common/PageMeta";
import packageJson from "../package.json";
import MembersOverview from "./pages/Members/MembersOverview";
import ShareCapitalOverview from "./pages/ShareCapital/ShareCapitalOverview";
import LoansOverview from "./pages/Loans/LoansOverview";

export default function App() {
  return (
    <>
      <PageMeta
        title={`CoopSys v${packageJson.version}`}
        description="CoopSys - Reliable Cooperative System For Modern Teams"
      />
      <Router>
        <ScrollToTop />
        <Routes>
          {/* Dashboard Layout */}
          <Route element={<AppLayout />}>
            <Route index path="/" element={<Home />} />

            {/* Members */}
            <Route path="/members" element={<MembersOverview />} />
            <Route path="/members/active" element={<Members />} />
            <Route path="/members/inactive" element={<Members />} />
            <Route path="/members/reports" element={<Members />} />
            <Route path="/members/add" element={<Members />} />

            {/* Share Capital */}
            <Route path="/share-capital" element={<ShareCapitalOverview />} />
            <Route path="/share-capital/active" element={<ShareCapital />} />
            <Route path="/share-capital/inactive" element={<ShareCapital />} />
            <Route path="/share-capital/reports" element={<ShareCapital />} />
            <Route path="/share-capital/add" element={<ShareCapital />} />

            {/* Loans */}
            <Route path="/loans" element={<LoansOverview />} />
            <Route path="/loans/active" element={<Loans />} />
            <Route path="/loans/inactive" element={<Loans />} />
            <Route path="/loans/reports" element={<Loans />} />
            <Route path="/loans/add" element={<Loans />} />
            <Route path="/loans/estimates" element={<Loans />} />

            {/* Reports */}
            <Route path="/reports" element={<Reports />} />
          </Route>

          {/* Auth Layout */}
          <Route path="/signin" element={<SignIn />} />
          <Route path="/signup" element={<SignUp />} />

          {/* Fallback Route */}
          <Route path="*" element={<NotFound />} />
        </Routes>
      </Router>
    </>
  );
}
